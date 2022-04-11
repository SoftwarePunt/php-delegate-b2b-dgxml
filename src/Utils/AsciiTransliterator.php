<?php

namespace SoftwarePunt\DGXML\Utils;

final class AsciiTransliterator
{
    public static function transliterate(string $input): string
    {
        return transliterator_transliterate('Any-Latin; Latin-ASCII', $input);
    }
}