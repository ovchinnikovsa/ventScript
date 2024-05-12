<?php

namespace Module\Core;

use Module\Core\Exceptions\CompileException;
use Module\UltraHightLanguage\Compiler\Compiler;
use Module\UltraHightLanguage\Compiler\File;
use Module\UltraHightLanguage\Compiler\Validator;

class Handler
{
    private $request;
    private $method;

    public function __construct(string $requestUri)
    {
        $this->request = new Ajax();

        $requestUri = ltrim($requestUri, '/');
        $method = $requestUri;
        if (!$this->isMethodExist($method))
            $this->request->sendResponse('Method not found');

        try {
            $this->$method();
        } catch (CompileException $e) {
            $this->request->sendResponse($e->getMessage());
        } catch (\Throwable $th) {
            $this->request->sendResponse('Internal error');
        }
    }

    private function isMethodExist(string $method): bool
    {
        return method_exists($this, $method);
    }

    private function compile(): void
    {
        $code = $this->request->getRequest()['code'];
        $validator = new Validator($code);
        if (!$validator->validatePhpCode())
            throw new CompileException('Invalid PHP code');

        $fileRequest = new File('request');
        $fileOutput = new File('output');

        $compiler = new Compiler($fileRequest, $fileOutput);
        $compiler->compile();

        $this->request->sendResponse('ok', false);
    }

    private function exec(): void
    {

    }

}