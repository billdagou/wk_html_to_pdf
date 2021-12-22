<?php
namespace Dagou\WkHtmlToPdf\ViewHelpers\Http\Download;

use Dagou\DagouFluid\ViewHelpers\Http\DownloadViewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class PdfViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('url', 'string', 'Web page Url');
        $this->registerArgument('options', 'string', 'Global options');
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->viewHelperVariableContainer->add(
            DownloadViewHelper::class,
            'filename',
            ($this->viewHelperVariableContainer->get(DownloadViewHelper::class, 'filename') ?: 'Document')
                .'.pdf'
        );

        return $this->execute(
            'wkhtmltopdf'.($this->arguments['options'] ? ' '.$this->arguments['options'] : '').' - -',
            GeneralUtility::getUrl($this->arguments['url'] ?? $this->renderChildren())
        );
    }

    /**
     * @param string $command
     * @param string $stdin
     *
     * @return string
     */
    protected function execute(string $command, string $stdin): string {
        $proc = proc_open(
            $command,
            [
                0 => ['pipe', 'r'],
                1 => ['pipe', 'w'],
            ],
            $pipes
        );

        if (is_resource($proc)) {
            fwrite($pipes[0], $stdin);
            fclose($pipes[0]);

            $stdout = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            proc_close($proc);

            return $stdout;
        }

        return '';
    }
}