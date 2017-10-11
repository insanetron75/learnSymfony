<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Lesson;
use AppBundle\Entity\LessonType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SyllabusController extends Controller
{

    /**
     * @Route("/syllabus", name="syllabus_home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAllAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $syllabus = $this->buildSyllabusDetails();
        return $this->render(
            'syllabus/showAll.html.twig',
            [
                'title' => 'All Syllabi',
                'syllabus' => $syllabus
            ]
        );
    }

    /**
     * @param string $syllabusName
     * @return Response
     *
     * @Route("/syllabus/{syllabusName}", name="selected_syllabus")
     */
    public function showAction($syllabusName)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        /** @var LessonType $lessonType */
        $lessonType = $this->getDoctrine()->getRepository(LessonType::class)
            ->findOneBy(['url' => $syllabusName]);
        $lessons = $this->buildLessonDetails($lessonType);

        return $this->render(
            'syllabus/show.html.twig',
            [
                'title' => $lessonType->getName(),
                'lessons' => $lessons
            ]
        );
    }

    public function buildSyllabusDetails()
    {
        // Get all lesson types
        $em = $this->getDoctrine()->getManager();
        $lessonTypes = $em->getRepository(LessonType::class)->findAll();

        $syllabusArray = [];
        /** @var LessonType $thisLessonType */
        foreach ($lessonTypes as $thisLessonType) {
            $lessonsArray['title'] = $thisLessonType->getName();
            $lessonsArray['url'] = $thisLessonType->getUrl();
            $lessonsArray['lessons'] = $this->buildLessonDetails($thisLessonType);
            $syllabusArray[] = $lessonsArray;
        }

        return $syllabusArray;
    }

    /**
     * @param LessonType $lessonType
     *
     * @return array
     */
    public function buildLessonDetails(LessonType $lessonType)
    {
        $lessonsArray = [
            'headings' => [
                'Ser',
                'Title',
                'Sub Title',
                'Chapter',
                'Section',
                'Star Level',
                'No. Of Periods',
                'Lesson Plans'
            ],
            'url' => $lessonType->getUrl()
        ];

        $em = $this->getDoctrine()->getManager();
        if ($lessonType) {
            $lessons = $em->getRepository(Lesson::class)->findBy(['lessonType' => $lessonType]);
        } else {
            $lessons = $em->getRepository(Lesson::class)->findAll();
        }

        $lessonsArray['lessons'] = [];
        /** @var Lesson $thisLesson */
        foreach ($lessons as $thisLesson) {
            if ($syllabus = $thisLesson->getSyllabus()) {
                $starLevel = $syllabus->getName();
            } else {
                $starLevel = 'N/A';
            }

            $lessonsArray['lessons'][] = [
                'Ser' => $thisLesson->getSer(),
                'Title' => $thisLesson->getTitle(),
                'Sub Title' => $thisLesson->getSubTitle(),
                'Chapter' => $thisLesson->getChapter(),
                'Section' => $thisLesson->getSection(),
                'Star Level' => $starLevel,
                'No. Of Periods' =>  $thisLesson->getNoOfPeriods(),
                'id' => $thisLesson->getId()
            ];
        }

        return $lessonsArray;
    }
}
