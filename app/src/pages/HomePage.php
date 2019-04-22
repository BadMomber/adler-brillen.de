<?php

namespace app\pages;
use Page;
use app\model\SliderItem;
use app\model\Testimonial;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
/**
 * Description of HomePage
 *
 * @author Mohamed
 */

class HomePage extends Page
{

	private static $has_many = [
		'SliderItems'	   => SliderItem::class,
		'Testimonials'     => Testimonial::class,
	];

	private static $owns = [
		'SliderItems',
	];
	/**
	 * Find the controller name by our convention of {$ModelClass}Controller
	 * Can be overriden by config variable
	 *
	 * @return string
	 */

//	public function getControllerName(){
//		return "app\controllers\HomePageController";
//	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		//GridField configuration with soratble items
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldOrderableRows('SortOrder'));

		//Add Slider Item tab
		$fields->addFieldToTab('Root.SliderItems', GridField::create(
			'SliderItems',
			'SliderItems',
			$this->SliderItems(),
			$gridFieldConfig
		));

		//GridField configuration with soratble items
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldOrderableRows('SortOrder'));

		//GridField configuration with soratble items
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldOrderableRows('SortOrder'));

		//Add Testimonials Tab
		$fields->addFieldToTab('Root.Testimonials', GridField::create(
			'Testimonials',
			'Testimonials',
			$this->Testimonials(),
			$gridFieldConfig
		));

		//Change the Title of the COntent Area to IntroText since it will be used to generate the Content for the introText, thus no need to create an extra DBField.
		$fields->fieldByName('Root.Main.Content')->setTitle('Einführungstext')->setDescription(_t('IntroText.Text', 'Einführungstext' ));

		// remove HeaderImage
		$fields->removeByName('HeaderImage');

		return $fields;
	}
}
