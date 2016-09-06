<?php

namespace docroms\Bundle\CncBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

/**
 * Created by PhpStorm.
 * User: docro
 * Date: 01/06/2016
 * Time: 14:03
 */
class Cnc
{
    /**
     * @var EntityManager
     */
    private $_entityManager;

    /**
     * @var array mandatory fields
     */
    private $mandatoryFields = array(
        'consumerKey' => null,
        'consumerSecret' => null,
        'oauthUrl' => null,
        'accessToken' => null,
        'accessTokenSecret' => null
    );

    /**
     * Paiement constructor.
     * @param EntityManager $entityManager
     * @param Container $container
     */
    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->_entityManager = $entityManager;
        //$container->getParameter('');
        foreach ($this->mandatoryFields as $field => $value) {
            $this->mandatoryFields[$field] = $container->getParameter(sprintf('cnc.%s', $field));
        }

    }

    /**
     * @return $this
     */
    public function init()
    {
        $provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId'                => 'demoapp',    // The client ID assigned to you by the provider
            'clientSecret'            => 'demopass',   // The client password assigned to you by the provider
            'redirectUri'             => 'http://example.com/your-redirect-url/',
            'urlAuthorize'            => 'http://brentertainment.com/oauth2/lockdin/authorize',
            'urlAccessToken'          => 'http://brentertainment.com/oauth2/lockdin/token',
            'urlResourceOwnerDetails' => 'http://brentertainment.com/oauth2/lockdin/resource'
        ]);

// If we don't have an authorization code then get one
        if (!isset($_GET['code']))
        {

            // Fetch the authorization URL from the provider; this returns the
            // urlAuthorize option and generates and applies any necessary parameters
            // (e.g. state).
            $authorizationUrl = $provider->getAuthorizationUrl();

            // Get the state generated for you and store it to the session.
            $_SESSION['oauth2state'] = $provider->getState();

            // Redirect the user to the authorization URL.
            header('Location: ' . $authorizationUrl);
            exit;

            // Check given state against previously stored one to mitigate CSRF attack
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

            unset($_SESSION['oauth2state']);
            exit('Invalid state');

        } else {

            try {

                // Try to get an access token using the authorization code grant.
                $accessToken = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);

                // We have an access token, which we may use in authenticated
                // requests against the service provider's API.
                echo $accessToken->getToken() . "\n";
                echo $accessToken->getRefreshToken() . "\n";
                echo $accessToken->getExpires() . "\n";
                echo ($accessToken->hasExpired() ? 'expired' : 'not expired') . "\n";

                // Using the access token, we may look up details about the
                // resource owner.
                $resourceOwner = $provider->getResourceOwner($accessToken);

                var_export($resourceOwner->toArray());

                // The provider provides a way to get an authenticated API request for
                // the service, using the access token; it returns an object conforming
                // to Psr\Http\Message\RequestInterface.
                $request = $provider->getAuthenticatedRequest(
                    'GET',
                    'http://brentertainment.com/oauth2/lockdin/resource',
                    $accessToken
                );

            } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

                // Failed to get the access token or user details.
                exit($e->getMessage());

            }
        }
        return $this;
    }

    /**
     *
     */
    public function auth(){
        echo "auth!!!";
        return $this;
    }
}