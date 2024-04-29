<?php

namespace core;
enum Responses: int
{
    case Created = 201;
    case BadReuest = 400;
    case NotFound = 404;
    case Rejected = 403;
    case Conflict = 409;
}