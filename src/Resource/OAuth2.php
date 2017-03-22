<?php

namespace Okta\Resource;

/**
 * Implementation of the Okta OAuth 2.0 resource, access via $okta->oauth
 *
 * http://developer.okta.com/docs/api/resources/oauth2.html
 */
class OAuth extends Base
{
    /**
     * Starting point for all OAuth 2.0 flows. This request authenticates the
     * user and returns an ID Token along with an authorization grant to the
     * client application as a part of the response the client might have
     * requested.
     *
     * @param  string $responseType   Can be a combination of code, token, and
     *                                id_token. The chosen combination
     *                                determines which flow is used. The code
     *                                response type returns an authorization
     *                                code which can be later exchanged for an
     *                                Access Token or a Refresh Token.
     * @param  string $clientId       Obtained during either UI client
     *                                registration or API client registration.
     *                                It is the identifier for the client and
     *                                it must match what is preregistered in
     *                                Okta.
     * @param  string $redirectUri    [description]Specifies the callback
     *                                location where the authorization code
     *                                should be sent and it must match what is
     *                                preregistered in Okta as a part of client
     *                                registration.
     * @param  string $scope          Can be a combination of openid, profile,
     *                                email, address and phone. The combination
     *                                determines the claims that are returned in
     *                                the id_token. The openid scope has to be
     *                                specified to get back an id_token.
     * @param  string $state          A client application provided state string
     *                                that might be useful to the application
     *                                upon receipt of the response. It can
     *                                contain alphanumeric, comma, period,
     *                                underscore and hyphen characters.
     * @param  string $nonce          Specifies a nonce that is reflected back
     *                                in the ID Token. It is used to mitigate
     *                                replay attacks.
     * @param  array  $optionalParams Array of additional optional parameters.
     *
     * @return string                 [description]
     */
    public function authorize($responseType, $clientId, $redirectUri, $scope, $state, $nonce, array $optionalParams = [])
    {
        $request = $this->requst->get('oauth2/v1/authorize');

        $this->request->data([
            'response_type' => $responseType,
            'client_id'     => $clientId,
            'redirect_uri'  => $redirectUri,
            'scope'         => $scope,
            'state'         => $state,
            'nonce'         => $nonce
        ]);

        $this->request->query($optionalParams);

        return $request->send();
    }

    public function token()
    {
        $request = $this->request->post('oauth2/v1/token');

        // ...

        $request->send();
    }
}
