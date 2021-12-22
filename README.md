# TYPO3 Extension: WK HTML to PDF

EXT:wk_html_to_pdf provides a ViewHelper to convert a web page to the PDF file.

**The extension version only matches the TYPO3 version, it doesn't mean anything else.**

## How to use it

First of all, you need to have [wkhtmltopdf](https://wkhtmltopdf.org/) installed on your server.

After that, you can use the viewhelper to generate the PDF file and download it.

    <df:http.download>
        <wkhtmltopdf:http.download.pdf>...</wkhtmltopdf:http.download.pdf>
    </df:http.download>

#### Attributes

- `url` (string) The URL of the web page you want to convert.
- `options` (string) Global options, which you can refer to `wkhtmltopdf --help`.