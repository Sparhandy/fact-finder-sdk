<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Client\FactFinder\Business\Api\Converter;

use FACTFinder\Adapter\ProductCampaign as FactFinderProductCampaign;
use Generated\Shared\Transfer\FactFinderProductCampaignResponseTransfer;

class ProductCampaignResponseConverter extends BaseConverter
{

    /**
     * @var \FACTFinder\Adapter\ProductCampaign
     */
    protected $productCampaignAdapter;

    /**
     * @param \FACTFinder\Adapter\ProductCampaign $productCampaignAdapter
     */
    public function __construct(FactFinderProductCampaign $productCampaignAdapter)
    {
        $this->productCampaignAdapter = $productCampaignAdapter;
    }

    /**
     * @return \Generated\Shared\Transfer\FactFinderProductCampaignResponseTransfer
     */
    public function convert()
    {
        $responseTransfer = new FactFinderProductCampaignResponseTransfer();

        return $responseTransfer;
    }

}
