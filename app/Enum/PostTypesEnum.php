<?php

namespace App\Enum;

enum PostTypesEnum: string
{
    case Article = 'article';
    case Tutorial = 'tutorial';
    case News = 'news';
    case SuccessStory = 'success_story';
}
