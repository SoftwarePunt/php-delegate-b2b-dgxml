<?php

namespace Utils;

use PHPUnit\Framework\TestCase;
use SoftwarePunt\DGXML\Utils\AsciiTransliterator;

class AsciiTransliteratorTest extends TestCase
{
    public function testTransliterate()
    {
        $input = "A æ Übérmensch på høyeste nivå! И я люблю PHP! ﬁ";
        $expectedOutput = "A ae Ubermensch pa hoyeste niva! I a lublu PHP! fi";
        $this->assertSame($expectedOutput, AsciiTransliterator::transliterate($input));
    }
}
