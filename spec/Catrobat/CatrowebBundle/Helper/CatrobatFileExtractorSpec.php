<?php

namespace spec\Catrobat\CatrowebBundle\Helper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Catrobat\CatrowebBundle\CatrowebBundle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;

class CatrobatFileExtractorSpec extends ObjectBehavior
{
	function let()
	{
		$this->beConstructedWith(__DIR__ . "/../Cache/");
	}
	
    function it_is_initializable()
    {
        $this->shouldHaveType('Catrobat\CatrowebBundle\Helper\CatrobatFileExtractor');
    }
    
    function it_extracts_a_valid_file()
    {
    	$filesystem = new Filesystem();
    	$valid_catrobat_file = new File(__DIR__ . "/../../../../src/Catrobat/CatrowebBundle/Tests/DataFixtures/CatrobatFiles/scaryghost.catrobat");
    	$path_to_extracted_folder = $this->extract($valid_catrobat_file);
//    	echo($path_to_extracted_folder);
    	$filesystem->remove($path_to_extracted_folder->getWrappedObject());
    }
}
