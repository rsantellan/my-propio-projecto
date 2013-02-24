<?php

class fileCacheHandler{
    
    public static function clearCacheWithKey($key)
    {
        $path = sfConfig::get('sf_cache_dir');
        $sentence = 'find '.$path.' -name "'.$key.'*" -exec rm -rf {} \;';
        sfContext::getInstance()->getLogger()->info('{fileCacheHandler} exec: '.$sentence);
        exec($sentence);
        
    }
}
