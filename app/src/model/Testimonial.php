<?php
namespace app\model;
use \SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use app\pages\HomePage;
use app\pages\KnowHowPage;
use app\util\UIElementInterface;
/**
 * This class represents slider items to be shown in page templates.
 *
 * @author Mohamed
 */
class Testimonial  extends DataObject
{
	private static $has_one = [
    	'HomePage'	  => HomePage::class,
	];
	private static $db = [
		'Content'	=> 'HTMLText',
		'Author'	=> 'Varchar(255)',
		'SortOrder' => 'Int',
	];
	
	private static $summary_fields = [
		'Author',
		'ContentSummary',
	];
	
	private static $field_labels = [
		'ContentSummary' => 'Inhalt',
		'Author'		 => 'Autor',
	];
	
	
	public function ContentSummary(){
		return $this->dbObject('Content')->Summary(5);
	}
	
	public function getTitle(){
		return $this->Author;
	}
	public function getCMSFields()
    {
		// Note the absence of any parent::getCMSFields
		$fields = new \SilverStripe\Forms\FieldList(
			new \SilverStripe\Forms\TextField('Author', 'Autor', null, 255),
		    \SilverStripe\Forms\DropdownField::create('HomePageID', 'Startseite', HomePage::get()->map())->setEmptyString(_t('Page.CHOOSE', 'Bitte wählen Sie eine Seite aus.')),
			new \SilverStripe\Forms\HTMLEditor\HTMLEditorField('Content', 'Inhalt')
		);

		// This line is necessary, and only AFTER you have added your fields
		$this->extend('updateCMSFields', $fields);
		return $fields;
	}
}
