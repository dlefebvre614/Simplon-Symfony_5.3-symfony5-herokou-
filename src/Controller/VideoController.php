<?php

namespace App\Controller;

use App\Entity\Videos;
use App\Form\VideoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VideoController extends AbstractController
{
    /**
     * @Route("/", name="videos")
     */
    public function videos(): Response
    {
        return $this->render('video/videos.html.twig', [
            'controller_name' => 'VideoController',
        ]);
    }

    /**
     * @Route("/video/{id}", name="video", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function video($id): Response
    {
        return $this->render('video/video.html.twig', [
            'controller_name' => 'VideoController',
            'id' => $id,
        ]);
    }

    /**
     * @Route("/video/add", name="video_add")
     */
    public function addVideo(Request $request): Response
    {
        $video = new Videos();
        $form = $this->createForm(VideoType::class, $video);

        return $this->render('video/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
