<?php

namespace App\Controller;

use App\Form\NameType;
use App\Entity\QuestionsLv1;
// use App\Repository\AnswersLv1Repository;
// use App\Repository\AnswersLv2Repository;
// use App\Repository\AnswersLv3Repository;
use App\Repository\ResponseLv1Repository;
use App\Repository\ResponseLv2Repository;
use App\Repository\ResponseLv3Repository;
use App\Repository\QuestionsLv1Repository;
use App\Repository\QuestionsLv2Repository;
use App\Repository\QuestionsLv3Repository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'main_page')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(NameType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $name = $data['name'];

            return $this->redirectToRoute(
                'level_choice',
                ['name' => $name],
                // 'level_easy', ['name' => $name],
                // 'level_medium', ['name' => $name],
                // 'level_hard', ['name' => $name],
            );
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/level', name: 'level_choice')]
    public function level(Request $request): Response
    {
        $name = $request->get('name');

        return $this->render('default/level.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/level/easy', name: 'level_easy')]
    public function easy(Request $request): Response
    {

        $name = $request->get('name');

        return $this->render('default/questions_lv1.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/level/medium', name: 'level_medium')]
    public function medium(Request $request): Response
    {

        $name = $request->get('name');

        return $this->render('default/questions_lv2.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/level/hard', name: 'level_hard')]
    public function hard(Request $request): Response
    {

        $name = $request->get('name');

        return $this->render('default/questions_lv3.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/level1', name: 'questions_level_1')]
    public function questions_Lv1(QuestionsLv1Repository $repository): Response
    {

        $questions_Lv1 = $repository->findAll();

        $encoders = new JsonEncoder();
        $normalizers = new ObjectNormalizer();

        $serializer = new Serializer([$normalizers], [$encoders]);
        $jsonContent = ($serializer->serialize($questions_Lv1, 'json'));

        $response = new Response;

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return new Response($jsonContent);
    }

    #[Route('/response_Lv1/{questionID}', name: 'response_level_1')]
    public function response_Lv1(ResponseLv1Repository $repository, int $questionID): Response
    {
        $response_Lv1 = $repository->findByQuestionId($questionID);

        $responseData = [];
        foreach ($response_Lv1 as $response) {
            $responseData[] = [
                'id' => $response->getId(),
                'proposition' => $response->getProposition(),
                'proposition_is_correct' => $response->isPropositionIsCorrect(),
                'answer' => $response->getAnswer(),
                'question_lv1_id' => $response->getQuestionLv1Id()
            ];
        }

        $jsonContent = json_encode($responseData);

        $response = new Response;
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return new Response($jsonContent);
    }

    #[Route('/level2', name: 'questions_level_2')]
    public function questions_Lv2(QuestionsLv2Repository $repository): Response
    {

        $questions_Lv2 = $repository->findAll();

        $encoders = new JsonEncoder();
        $normalizers = new ObjectNormalizer();

        $serializer = new Serializer([$normalizers], [$encoders]);
        $jsonContent = ($serializer->serialize($questions_Lv2, 'json'));


        $response = new Response;

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return new Response($jsonContent);
    }

    #[Route('/response_Lv2/{questionID}', name: 'response_level_2')]
    public function response_Lv2(ResponseLv2Repository $repository, int $questionID): Response
    {
        $response_Lv2 = $repository->findByQuestionId($questionID);

        $responseData = [];
        foreach ($response_Lv2 as $response) {
            $responseData[] = [
                'id' => $response->getId(),
                'proposition' => $response->getProposition(),
                'proposition_is_correct' => $response->isPropositionIsCorrect(),
                'answer' => $response->getAnswer(),
                'question_lv2_id' => $response->getQuestionLv2Id()
            ];
        }

        $jsonContent = json_encode($responseData);

        $response = new Response;
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return new Response($jsonContent);
    }

    #[Route('/level3', name: 'questions_level_3')]
    public function questions_Lv3(QuestionsLv3Repository $repository): Response
    {

        $questions_Lv3 = $repository->findAll();

        $encoders = new JsonEncoder();
        $normalizers = new ObjectNormalizer();

        $serializer = new Serializer([$normalizers], [$encoders]);
        $jsonContent = ($serializer->serialize($questions_Lv3, 'json'));


        $response = new Response;

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return new Response($jsonContent);
    }

    #[Route('/response_Lv3/{questionID}', name: 'response_level_3')]
    public function response_Lv3(ResponseLv3Repository $repository, int $questionID): Response
    {
        $response_Lv3 = $repository->findByQuestionId($questionID);

        $responseData = [];
        foreach ($response_Lv3 as $response) {
            $responseData[] = [
                'id' => $response->getId(),
                'proposition' => $response->getProposition(),
                'proposition_is_correct' => $response->isPropositionIsCorrect(),
                'answer' => $response->getAnswer(),
                'question_lv3_id' => $response->getQuestionLv3Id()
            ];
        }

        $jsonContent = json_encode($responseData);

        $response = new Response;
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return new Response($jsonContent);
    }
}
