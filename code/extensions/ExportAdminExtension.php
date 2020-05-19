<?php

class ExportAdminExtension extends Extension {
    public function updateEditForm($form){
		$gridField = $form->Fields()->fieldByName($this->owner->modelClass);
        $config = $gridField->getConfig();
        if($oldExportButton = $config->getComponentByType('GridFieldExportButton')) {
		$config->addComponent($newExportButton = new GridFieldExporter('before'));

		// Set Header and Export columns on new Export Button
		$newExportButton->setCsvHasHeader($oldExportButton->getCsvHasHeader()); 
		$newExportButton->setExportColumns($oldExportButton->getExportColumns());

		$config->removeComponentsByType('GridFieldExportButton');
	}
    }
}
