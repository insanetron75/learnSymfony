<?php
namespace AppBundle\Pdf;

use AppBundle\Entity\Lesson;
use AppBundle\Entity\LessonPlan;
use FPDF;

class LessonPlanPdf extends FPDF
{
    private $imagePath;
    private $lessonPlan;
    private $lesson;

    /**
     * LessonPlanPdf constructor.
     *
     * @param        $lessonPlan
     */
    public function __construct(LessonPlan $lessonPlan)
    {
        parent::__construct();
        $this->imagePath  = ("/home/tim/github/learnSymfony/acf_project/src/AppBundle/Pdf/images/");
        $this->lessonPlan = $lessonPlan;
        $this->lesson     = $lessonPlan->getLesson();
    }


    public function build()
    {
        $this->AddPage();
        $this->startSection();
        $this->middleSection();
        $this->endSection();
    }

    // header
    function Header()
    {
        // Logo
        $this->Image($this->imagePath . 'ACF_Logo.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(40, 10, 'Lesson Plan', 0, 0, 'C');
        // Army Logo
        // Logo
        $this->Image($this->imagePath . 'British_Army_Logo.png', 170, 20, 30);
        // Line break
        $this->Ln(10);

        // Lesson Title
        $this->Cell(35);
        $this->SetFont('Arial', 'B', 10);
        $this->cell(30, 10, 'Title:', 1, 0);
        $this->SetFont('Arial', null, 10);
        $this->cell(90, 10, $this->lesson->getTitle(), 1, 0, 'C');

        // Sub Title
        $this->ln(10);
        $this->Cell(35);
        $this->SetFont('Arial', 'B', 10);
        $this->cell(30, 10, 'Sub Title:', 1, 0);
        $this->SetFont('Arial', null, 10);
        $this->cell(90, 10, $this->lesson->getSubTitle(), 1, 0, 'C');

        // Instructor
        $this->ln(10);
        $this->Cell(35);
        $this->SetFont('Arial', 'B', 10);
        $this->cell(30, 10, 'Instructor:', 1, 0);
        $this->SetFont('Arial', null, 10);
        $this->cell(90, 10, $this->lessonPlan->getInstructor()->__toString(), 1, 0, 'C');

        // Length
        $this->ln(10);
        $this->Cell(35);
        $this->SetFont('Arial', 'B', 10);
        $this->cell(30, 10, 'Length:', 1, 0);
        $this->SetFont('Arial', null, 10);
        $this->cell(90, 10, $this->lessonPlan->getLength() . ' Minutes', 1, 0, 'C');

        // Reference
        $lessonType = $this->lesson->getLessonType()->getName();
        $this->ln(10);
        $this->Cell(35);
        $this->SetFont('Arial', 'B', 10);
        $this->cell(30, 10, 'Reference:', 1, 0);
        $this->SetFont('Arial', null, 10);
        $this->cell(
            90,
            10,
            $lessonType . ': Chapter ' . $this->lesson->getChapter() . ' ' . $this->lesson->getSection(),
            1,
            0,
            'C'
        );

        $this->ln(20);
    }

    public function startSection()
    {
        // Title
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(40, 10, 'Start Section', 0, 0, 'C');

        $this->ln(10);
        $this->SetFont('Arial', null, 10);
        $sectionText = str_replace("\r", '', $this->lessonPlan->getStart());
        $this->MultiCell(190, 5, $sectionText, 1);
    }

    public function middleSection()
    {
        // Title
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(40, 10, 'Middle Section', 0, 0, 'C');

        $this->ln(10);
        $this->SetFont('Arial', null, 10);
        $sectionText = str_replace("\r", '', $this->lessonPlan->getMiddle());
        $this->MultiCell(190, 5, $sectionText, 1);
    }

    public function endSection()
    {
        // Title
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(40, 10, 'End Section', 0, 0, 'C');

        $this->ln(10);
        $this->SetFont('Arial', null, 10);
        $sectionText = str_replace("\r", '', $this->lessonPlan->getEnd());
        $this->MultiCell(190, 5, $sectionText, 1);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}