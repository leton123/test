<div class="editor" id="editor">
    <form id="editform" action="" method="post">
        <div class="e_tips" id="e_tips" data-tips="<?php echo $conf->GetConf('tips'); ?>" title="删除控件">tips: 更多编辑器用法<a
                href="#">请点击我</a>!&nbsp;&nbsp;<i class="icon-close" onclick="TipsClear()"></i></div>
        <div class="floatFix"></div>
        <textarea name="e_content" id="e_content" placeholder="创建笔记..."></textarea>
        <div class="e_zoom" onclick="Zoom();"><i id="e_zoom" class="icon-zoomin"></i></div>
        <div class="e_tools">
            <div class="files" onclick="FileManage();"><span id="file" class="icon-file"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
            <div class="e_tool stick" onclick="EditorTool(this)">Stick <i class="icon-pin"></i></div>
            <div class="e_tool hidden" onclick="EditorTool(this)">Hide <i class="icon-eye"></i></div>
            <div class="e_addnote">Send <span class="icon-send"><span class="path1"></span><span class="path2"></span></span></div>
            <input hidden id="tool1" type="text" name="stick" value="0">
            <input hidden id="tool2" type="text" name="hidden" value="0">
            <button hidden type="submit"></button>
            <div class="floatFix"></div>
        </div>
    </form>
</div>
<script src="/asset/js/editor.js"></script>