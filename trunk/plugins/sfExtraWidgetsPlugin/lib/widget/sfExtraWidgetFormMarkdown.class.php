<?php 
/**
* sfExtraWidgetFormInputSearch
* 
* The class render a textarea for code edit
* 
* @author   David Zeller <zellerda01@gmail.com>
*/
class sfExtraWidgetFormMarkdown extends sfWidgetFormTextarea
{    
    public function configure($options = array(), $attributes = array())
    {        
        $this->addOption('width', 400);
        $this->addOption('height', 200);
        $this->addOption('padding', 6);
        
        parent::configure($options, $attributes);
    }
    
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $response = sfContext::getInstance()->getResponse();
        $response->addJavascript('/sfExtraWidgetsPlugin/js/livepipe.js');
        $response->addStylesheet('/sfExtraWidgetsPlugin/css/markdown.css');
        
        $this->setAttribute('style', 'width: ' . ($this->getOption('width') - $this->getOption('padding')) . 'px; height: ' . $this->getOption('height') . 'px;');
        
        if(array_key_exists('class', $attributes))
        {
            $attributes['class'] .= ' ' . 'markdown_field';
        }
        else
        {
            $attributes['class'] = 'markdown_field';
        }
        
        return content_tag('div', parent::render($name, $value, $attributes, $errors) . $this->addScript($name), array('style' => 'width:' . $this->getOption('width') . 'px'));
    }
    
    protected function addScript($name)
    {
        $javascript = "
            var textarea = new Control.TextArea('" . $this->generateId($name) . "');
            var toolbar = new Control.TextArea.ToolBar(textarea);
            toolbar.container.id = '" . $this->generateId($name) . "_markdown_toolbar';
            $(toolbar.container.id).className = 'markdown_toolbar';
            
            //buttons
            toolbar.addButton('Italics',function(){
                this.wrapSelection('*','*');
            },{
                id: '" . $this->generateId($name) . "_markdown_italics_button',
                class: 'markdown_italics_button'
            });
            
            toolbar.addButton('Bold',function(){
                this.wrapSelection('**','**');
            },{
                id: '" . $this->generateId($name) . "_markdown_bold_button',
                class: 'markdown_bold_button'
            });
            
            toolbar.addButton('Link',function(){
                var selection = this.getSelection();
                var response = prompt('Enter Link URL','');
                if(response == null)
                    return;
                this.replaceSelection('[' + (selection == '' ? 'Link Text' : selection) + '](' + (response == '' ? 'http://link_url/' : response)." . 'replace(/^(?!(f|ht)tps?:\/\/)/,' . "'http://') + ')');
            },{
                id: '" . $this->generateId($name) . "_markdown_link_button',
                class: 'markdown_link_button'
            });
            
            toolbar.addButton('Image',function(){
                var selection = this.getSelection();
                var response = prompt('Enter Image URL','');
                if(response == null)
                    return;
                this.replaceSelection('![' + (selection == '' ? 'Image Alt Text' : selection) + '](' + (response == '' ? 'http://image_url/' : response).replace(/^(?!(f|ht)tps?:\/\/)/,'http://') + ')');
            },{
                id: '" . $this->generateId($name) . "_markdown_image_button',
                class: 'markdown_image_button'
            });
            
            toolbar.addButton('Heading',function(){
                var selection = this.getSelection();
                if(selection == '')
                    selection = 'Heading';" . '
                this.replaceSelection("# " + selection + " #" + $R(0,Math.max(5,selection.length)).collect(function(){"-"}).join("") + "\n");' . "
            },{
                id: '" . $this->generateId($name) . "_markdown_heading_button',
                class: 'markdown_heading_button'
            });
            
            toolbar.addButton('Unordered List',function(event){
                this.collectFromEachSelectedLine(function(line){
                    " . 'return event.shiftKey ? (line.match(/^\*{2,}/) ? line.replace(/^\*/,"") : line.replace(/^\*\s/,"")) : (line.match(/\*+\s/) ? "*" : "* ") + line; ' . "
                });
            },{
                id: '" . $this->generateId($name) . "_markdown_unordered_list_button',
                class: 'markdown_unordered_list_button'
            });
            
            toolbar.addButton('Ordered List',function(event){
                var i = 0;
                this.collectFromEachSelectedLine(function(line){
                    " . 'if(!line.match(/^\s+$/)){' . "
                        ++i;
                        " . 'return event.shiftKey ? line.replace(/^\d+\.\s/,"") : (line.match(/\d+\.\s/) ? "" : i + ". ") + line;' . "
                    }
                });
            },{
                id: '" . $this->generateId($name) . "_markdown_ordered_list_button',
                class: 'markdown_ordered_list_button'
            });
            
            toolbar.addButton('Block Quote',function(event){
                this.collectFromEachSelectedLine(function(line){
                    " . 'return event.shiftKey ? line.replace(/^\> /,"") : "> " + line;' . "
                });
            },{
                id: '" . $this->generateId($name) . "_markdown_quote_button',
                class: 'markdown_quote_button'
            });
            
            toolbar.addButton('Code Block',function(event){
                this.collectFromEachSelectedLine(function(line){
                    return event.shiftKey ? line.replace(/    /,'') : '    ' + line;
                });
            },{
                id: '" . $this->generateId($name) . "_markdown_code_button',
                class: 'markdown_code_button'
            });
            
            toolbar.addButton('Help',function(){
                window.open('http://daringfireball.net/projects/markdown/dingus');
            },{
                id: '" . $this->generateId($name) . "_markdown_help_button',
                class: 'markdown_help_button'
            });";
        
        return javascript_tag($javascript);
    }
}
?>