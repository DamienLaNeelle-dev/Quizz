<?php

namespace App\Entity;

use App\Repository\ResponseLv3Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponseLv3Repository::class)]
class ResponseLv3
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $proposition = null;

    #[ORM\Column]
    private ?bool $proposition_is_correct = null;

    #[ORM\Column(length: 255)]
    private ?string $answer = null;

    #[ORM\Column]
    private ?int $question_lv3_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProposition(): ?string
    {
        return $this->proposition;
    }

    public function setProposition(string $proposition): self
    {
        $this->proposition = $proposition;

        return $this;
    }

    public function isPropositionIsCorrect(): ?bool
    {
        return $this->proposition_is_correct;
    }

    public function setPropositionIsCorrect(bool $proposition_is_correct): self
    {
        $this->proposition_is_correct = $proposition_is_correct;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getQuestionLv3Id(): ?int
    {
        return $this->question_lv3_id;
    }

    public function setQuestionLv3Id(int $question_lv3_id): self
    {
        $this->question_lv3_id = $question_lv3_id;

        return $this;
    }
}
