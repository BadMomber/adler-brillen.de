<?php
namespace app\model;
use \SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use app\pages\HomePage;
use app\util\UIElementInterface;
/**
 * This class represents slider items to be shown in page templates.
 *
 * @author Mohamed
 */
class SliderItem  extends DataObject implements UIElementInterface
{
	private static $has_one = [
        'Image'		  => Image::class,
		'HomePage'	  => HomePage::class,

    ];
	private static $db = [
		'Content'	=> 'HTMLText',
		'Title'		=> 'Varchar(255)',
		'SortOrder' => 'Int',
	];
	
	private static $summary_fields = [
		'Title',
		'ContentSummary',
		'Image.CMSThumbnail' 
	];
	
	private static $field_labels = [
		'ContentSummary'   => 'Inhalt',
		'Title'		=> 'Titel',
		'Image.CMSThumbnail' =>'Bild'
	];
	
	private static $owns = [
        'Image',
    ];
	public function renderToTemplate(){

		return $this->renderWith('app/model/SliderItem');
	}
	public function ContentSummary(){
		return $this->dbObject('Content')->Summary(5);
	}
//	public function getCMSFields() {
//		$fields = parent::getCMSFields();
//		
//		$fields->addFieldToTab('Root.Attachments', UploadField::create('Photo'));
//		$fields->addFieldToTab('Root.Attachments', UploadField::create('Brochure','Travel brochure, optional (PDF only)'));
//
//		return $fields;
//    }
	
	public function getCMSFields()
    {
		// Note the absence of any parent::getCMSFields
		$fields = new \SilverStripe\Forms\FieldList(
			new \SilverStripe\Forms\TextField('Title', 'Titel', null, 255),
		    new \SilverStripe\AssetAdmin\Forms\UploadField('Image', 'Bild'),
			\SilverStripe\Forms\DropdownField::create('HomePageID', 'Startseite', HomePage::get()->map())->setEmptyString(_t('Page.CHOOSE', 'Bitte wählen Sie eine Seite aus.')),
			\SilverStripe\Forms\DropdownField::create('KnowHowPageID', 'KnowHowseite', KnowHowPage::get()->map())->setEmptyString(_t('Page.CHOOSE', 'Bitte wählen Sie eine Seite aus.')),
			new \SilverStripe\Forms\HTMLEditor\HTMLEditorField('Content', 'Inhalt')
		);

		// This line is necessary, and only AFTER you have added your fields
		$this->extend('updateCMSFields', $fields);
		return $fields;
	}
}
