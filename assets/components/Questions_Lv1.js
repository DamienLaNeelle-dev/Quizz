import React, { useState, useEffect } from "react";
import axios from "axios";

const Questions_Lv1 = () => {
  const [data1, setData1] = useState([]);
  const [currentQuestionIndex, setCurrentQuestionIndex] = useState(0);
  const [currentAnswerId, setCurrentAnswerId] = useState(null);
  const [questionResponses, setQuestionResponses] = useState([]);
  const [selectedAnswer, setSelectedAnswer] = useState(null);
  const [showAnswer, setShowAnswer] = useState(false);
  const [loading, setLoading] = useState(false);
  const [isAnswered, setIsAnswered] = useState(false);
  const [score, setScore] = useState(0);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const questionsResponse = await axios.get(
          "https://damienlaneelle-dev.github.io/Quizz/level1"
        );
        const randomizedQuestions = shuffleArray(questionsResponse.data).slice(
          0,
          10
        );
        setData1(randomizedQuestions); // Récupère 10 questions aléatoires
      } catch (error) {
        console.error(error);
      }
    };

    fetchData();
  }, []);

  useEffect(() => {
    if (currentQuestionIndex >= 0 && currentQuestionIndex < data1.length) {
      const fetchResponses = async () => {
        setLoading(true);
        try {
          const questionId = data1[currentQuestionIndex].id;
          const responsesResponse = await axios.get(
            `https://damienlaneelle-dev.github.io/Quizz/response_Lv1/${questionId}`
          );
          setQuestionResponses(responsesResponse.data);
        } catch (error) {
          console.error(error);
        } finally {
          setLoading(false);
        }
      };

      fetchResponses();
    }
  }, [currentQuestionIndex, data1]);

  const handleRestartButton = () => {
    setCurrentQuestionIndex(0);
    setCurrentAnswerId(null);
    setShowAnswer(false);
    setSelectedAnswer(null);
    setIsAnswered(false);
    setScore(0);

    const randomizedQuestions = shuffleArray(data1).slice(0, 10);
    setData1(randomizedQuestions);
  };

  const handleButtonClick = (answerId) => {
    if (!isAnswered) {
      setCurrentAnswerId(answerId);
      setShowAnswer(true);

      const selectedResponse = questionResponses.find(
        (response) => response.id === answerId
      );

      if (selectedResponse) {
        setSelectedAnswer(selectedResponse.answer);
        if (selectedResponse.proposition_is_correct) {
          setScore((prevScore) => prevScore + 1);
        }
      }

      setIsAnswered(true);

      const timer = setTimeout(() => {
        setCurrentAnswerId(null);
        setShowAnswer(false);
        setSelectedAnswer(null);
        setIsAnswered(false);
        setCurrentQuestionIndex((currentIndex) => currentIndex + 1);
      }, 50);

      return () => clearTimeout(timer);
    }
  };

  const shuffleArray = (array) => {
    // Algorithme de mélange de Fisher-Yates
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  };

  return (
    <div className="content">
      <div>
        {data1.length > 0 &&
          currentQuestionIndex < data1.length &&
          data1
            .slice(currentQuestionIndex, currentQuestionIndex + 1)
            .map((question) => (
              <React.Fragment key={question.id}>
                <h2>{question.label}</h2>
                <div className="responses">
                  {loading ? (
                    <h3>Chargement des réponses ...</h3>
                  ) : (
                    questionResponses.map((response) => (
                      <button
                        key={response.id}
                        onClick={() => handleButtonClick(response.id)}
                        disabled={isAnswered}
                      >
                        {response.proposition}
                      </button>
                    ))
                  )}
                </div>
                <div className="selected-answer">
                  {showAnswer && <h3>{selectedAnswer}</h3>}
                </div>
              </React.Fragment>
            ))}

        {data1.length > 0 && currentQuestionIndex === data1.length && (
          <React.Fragment>
            <h3>Votre score: {score}/10</h3>
            <h3>Voulez-vous recommencer?</h3>
            <button onClick={handleRestartButton}>Restart</button>
          </React.Fragment>
        )}
      </div>
    </div>
  );
};

export default Questions_Lv1;
