<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Client\FactFinderApi\Business\Api\Converter\Data;

use FACTFinder\Data\Paging;
use Generated\Shared\Transfer\FactFinderApiDataPageTransfer;
use Generated\Shared\Transfer\FactFinderApiDataPagingTransfer;
use SprykerEco\Client\FactFinderApi\Business\Api\Converter\BaseConverter;

class PagingConverter extends BaseConverter
{

    /**
     * @var \FACTFinder\Data\Paging
     */
    protected $paging;

    /**
     * @var \SprykerEco\Client\FactFinderApi\Business\Api\Converter\Data\ItemConverter
     */
    protected $itemConverter;

    /**
     * @param \SprykerEco\Client\FactFinderApi\Business\Api\Converter\Data\ItemConverter $itemConverter
     */
    public function __construct(
        ItemConverter $itemConverter
    ) {
        $this->itemConverter = $itemConverter;
    }

    /**
     * @param \FACTFinder\Data\Paging $paging
     *
     * @return void
     */
    public function setPaging(Paging $paging)
    {
        $this->paging = $paging;
    }

    /**
     * @return \Generated\Shared\Transfer\FactFinderApiDataPagingTransfer
     */
    public function convert()
    {
        $factFinderDataPagingTransfer = new FactFinderApiDataPagingTransfer();
        $factFinderDataPagingTransfer->setPageCount($this->paging->getPageCount());
        $factFinderDataPagingTransfer->setFirstPage($this->convertPage($this->paging->getFirstPage()));
        $factFinderDataPagingTransfer->setLastPage($this->convertPage($this->paging->getLastPage()));
        $factFinderDataPagingTransfer->setPreviousPage($this->convertPage($this->paging->getPreviousPage()));
        $factFinderDataPagingTransfer->setCurrentPage($this->convertPage($this->paging->getCurrentPage()));
        $factFinderDataPagingTransfer->setNextPage($this->convertPage($this->paging->getNextPage()));

        return $factFinderDataPagingTransfer;
    }

    /**
     * @param \FACTFinder\Data\Page|null $page
     *
     * @return \Generated\Shared\Transfer\FactFinderApiDataPageTransfer
     */
    protected function convertPage($page)
    {
        $factFinderDataPageTransfer = new FactFinderApiDataPageTransfer();
        if ($page === null) {
            return $factFinderDataPageTransfer;
        }

        $factFinderDataPageTransfer->setPageNumber($page->getPageNumber());
        $this->itemConverter->setItem($page);
        $factFinderDataPageTransfer->setItem(
            $this->itemConverter->convert()
        );

        return $factFinderDataPageTransfer;
    }

}