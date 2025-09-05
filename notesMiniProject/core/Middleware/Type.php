<?php

namespace Core\Middleware;

enum Type
{
    case AUTH;
    case GUEST;
    case NULL;
}
