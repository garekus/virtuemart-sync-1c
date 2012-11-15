<?php

define("CATEGORY_FOR_NEW_ARTICLES",		loadFromConfig());

class Component
{
	public function importArticlesPrices()
	{
		$findedNewArticles = FALSE;
		
		$importedArticles = loadFromXMLFile();
		
		foreach ($importedArticles as $article)
		{
			if (newArticle($article))
			{
				addNewArticle($article, CATEGORY_FOR_NEW_ARTICLES);			
				$findedNewArticles = TRUE;
			}
			else
			{
				updateInfo($article);
			}			
		}
		
		if ($findedNewArticles === TRUE) showMessage("New articles created in ".CATEGORY_FOR_NEW_ARTICLES);
	}
	
	
}

?>
