<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 05/10/2017
 * Time: 22:24
 */

namespace AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Form\LoginForm;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $formFactory = null;
    private $em = null;
    private $router;
    private $logger;

    /**
     * LoginFormAuthenticator constructor.
     *
     * @param FormFactoryInterface   $formFactory
     * @param EntityManagerInterface $em
     * @param RouterInterface        $router
     * @param LoggerInterface        $logger
     */
    public function __construct(FormFactoryInterface $formFactory, EntityManagerInterface $em, RouterInterface $router, LoggerInterface $logger)
    {
        $this->formFactory = $formFactory;
        $this->em = $em;
        $this->router = $router;
        $this->logger = $logger;
    }

    public function getCredentials(Request $request)
    {
        $isLoginSubmit = $request->getPathInfo() == '/login' && $request->isMethod('POST');
        if (!$isLoginSubmit) {
            return null;
        }

        $form = $this->formFactory->create(LoginForm::class);
        $form->handleRequest($request);
        $data = $form->getData();

        $request->getSession()->set(
            Security::LAST_USERNAME,
            $data['_username']
        );
        return $data;

    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $username = $credentials['_username'];
        $users = $this->em->getRepository(User::class);
        return $users->findOneBy(
            [
                'userName' => $username
            ]
        );
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        $enteredPasswords = $credentials['_password'];
        $correct = password_verify($enteredPasswords, $user->getPassword());
        if ($correct) {
            $this->logger->info('Logged In!');
            return true;
        } else {
            $this->logger->error('Incorrect Password');
            return false;
        }
    }

    /**
     *
     */
    protected function getLoginUrl()
    {
        return $this->router->generate('security_login');
    }


    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new RedirectResponse('security_login');
    }


}