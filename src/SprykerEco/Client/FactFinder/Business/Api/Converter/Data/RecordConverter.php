<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Client\FactFinder\Business\Api\Converter\Data;

use FACTFinder\Data\Record;
use Generated\Shared\Transfer\FactFinderDataRecordTransfer;
use SprykerEco\Client\FactFinder\Business\Api\Converter\BaseConverter;
use SprykerEco\Shared\FactFinder\FactFinderConstants;

class RecordConverter extends BaseConverter
{

    /**
     * @var \FACTFinder\Data\Record
     */
    protected $record;

    /**
     * @param \FACTFinder\Data\Record $record
     *
     * @return void
     */
    public function setRecord(Record $record)
    {
        $this->record = $record;
    }

    /**
     * @return \Generated\Shared\Transfer\FactFinderDataRecordTransfer
     */
    public function convert()
    {
        $factFinderDataRecordTransfer = new FactFinderDataRecordTransfer();
        $factFinderDataRecordTransfer->setId($this->record->getID());
        $factFinderDataRecordTransfer->setSimilarity($this->record->getSimilarity());
        $factFinderDataRecordTransfer->setPosition($this->record->getPosition());
        $factFinderDataRecordTransfer->setSeoPath($this->record->getSeoPath());
        $factFinderDataRecordTransfer->setKeywords($this->record->getKeywords());

        $this->convertFields($factFinderDataRecordTransfer);

        return $factFinderDataRecordTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FactFinderDataRecordTransfer $factFinderDataRecordTransfer
     *
     * @return void
     */
    protected function convertFields(FactFinderDataRecordTransfer $factFinderDataRecordTransfer)
    {
        $fields = [];
        foreach (FactFinderConstants::ITEM_FIELDS as $itemFieldName) {
            $fields[$itemFieldName] = $this->record->getField($itemFieldName);
        }
        $factFinderDataRecordTransfer->setFields($fields);
    }

}
