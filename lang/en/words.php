<?php
$arr = [];
foreach (\App\Models\Word::all() as $word){
    $arr[$word->key] = $word->word_en;
}
return $arr;
