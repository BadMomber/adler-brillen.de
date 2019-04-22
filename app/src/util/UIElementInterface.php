<?php
namespace app\util;
/**
 * This interface must be implemented by DataObjects that renders their own templates.
 * @author Mohamed
 */
interface UIElementInterface {
	public function renderToTemplate();
}
