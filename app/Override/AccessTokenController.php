<?php


namespace Laravel\Passport\Http\Controllers;

use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser as JwtParser;
use League\OAuth2\Server\AuthorizationServer;
use Nyholm\Psr7\Response as Psr7Response;
use Psr\Http\Message\ServerRequestInterface;

class AccessTokenController
{
    use HandlesOAuthErrors;

    /**
     * The authorization server.
     *
     * @var \League\OAuth2\Server\AuthorizationServer
     */
    protected $server;

    /**
     * The token repository instance.
     *
     * @var \Laravel\Passport\TokenRepository
     */
    protected $tokens;

    /**
     * The JWT parser instance.
     *
     * @var \Lcobucci\JWT\Parser
     *
     * @deprecated This property will be removed in a future Passport version.
     */
    protected $jwt;

    /**
     * Create a new controller instance.
     *
     * @param  \League\OAuth2\Server\AuthorizationServer  $server
     * @param  \Laravel\Passport\TokenRepository  $tokens
     * @param  \Lcobucci\JWT\Parser  $jwt
     * @return void
     */
    public function __construct(
        AuthorizationServer $server,
        TokenRepository $tokens,
        JwtParser $jwt
    ) {
        $this->jwt = $jwt;
        $this->server = $server;
        $this->tokens = $tokens;
    }

    /**
     * Authorize a client to access the user's account.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface  $request
     * @return \Illuminate\Http\Response
     */
    public function issueToken(ServerRequestInterface $request)
    {
        //    return 'hello';
        return $this->withErrorHandling(function () use ($request) {
            // return $this->convertResponse(
            //     $this->server->respondToAccessTokenRequest($request, new Psr7Response)
            // );
            $token = $this->convertResponse(
                $this->server->respondToAccessTokenRequest($request, new Psr7Response)
            );
            $parse = json_decode($token->content());
            $cookie = $this->getCookie($parse->refresh_token);
            return response()->json([
                "token_type" => "Bearer",
                "expires_in" => $parse->expires_in,
                "access_token" => $parse->access_token
            ])->withCookie($cookie);
        });
    }
    private function getCookie($tokendata)
    {
        return cookie(
            'Rtoken',
            $tokendata,
            864000
        );

        
        
    }
}
