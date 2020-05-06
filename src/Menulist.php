<?php

namespace Webzera\Lararoleadmin;

use Illuminate\Database\Eloquent\Model;

use Webzera\Lararoleadmin\Page;

class Menulist extends Model
{
    static public function getParentname($parentid)
    {
    	return Menulist::where('page_id', $parentid)->first()['menu_name'];
    }
    static public function isthisparentmenu($pageid)
    {
    	$ifhave=Menulist::where('parent_id', $pageid)->count();
    	if($ifhave)
    	return 1;
    	else
    	return 0;
    }
    static public function getpageslug($pageid)
    {
    	return Page::where('id', $pageid)->first()['slug'];
    }
}
