<?php
$arr = [];
foreach (\App\Models\Word::all() as $word){
    $arr[$word->key] = $word->word_uz;
}
return $arr;
