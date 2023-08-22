<?php

declare(strict_types=1);

namespace App\Enums;

enum ReputationType: string
{
    case TOPIC = 'topic';
    case ANSWER = 'answer';
    case COMMENT = 'comment';
    case UPVOTE = 'upvote';
    case DOWNVOTE = 'downvote';
    case ACCEPTED_ANSWER = 'accepted_answer';

    public function value(): int
    {
        return match ($this) {
            self::TOPIC => 2,
            self::ANSWER => 3,
            self::COMMENT => 1,
            self::UPVOTE => 7,
            self::DOWNVOTE => 2,
            self::ACCEPTED_ANSWER => 15,
        };
    }
}
