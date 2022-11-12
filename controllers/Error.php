<?php

class CustomError
{
    public function show_404()
    {
        throwError(REQUEST_NOT_FOUND);
    }
}
