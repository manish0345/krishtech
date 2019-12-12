<?php


namespace TrainingManish\InvoiceFont\Plugin;


use Magento\Framework\App\Filesystem\DirectoryList;

class AddFontToPdf
{
    protected $_rootDirectory;

    public function __construct(\Magento\Framework\Filesystem $filesystem)
    {
        $this->_rootDirectory = $filesystem->getDirectoryRead(DirectoryList::ROOT);
    }

    public function beforeDrawLineBlocks($subject, $page, array $draw, array $pageSettings = [])
    {
        $newDraw = $draw;

        $font = \Zend_Pdf_Font::fontWithPath(
            $this->_rootDirectory->getAbsolutePath('lib/internal/dejavu-sans/DejaVuSansCondensed.ttf')
        );
        $page->setFont($font, '7');

        return [$page, $newDraw, $pageSettings];
    }
}