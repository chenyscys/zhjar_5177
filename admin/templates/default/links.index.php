<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>链接管理</h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=links&op=add" ><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch">
    <input type="hidden" value="links" name="act">
    <input type="hidden" value="index" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label for="search_name">选择类型</label></th>
          <td>
            <select name="search_type_id" id="search_type_id">
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['types_list']) && is_array($output['types_list'])){ ?>
              <?php foreach($output['types_list'] as $k => $v){ ?>
              <option value="<?php echo $v['id'];?>" <?php if($output['search_type_id']==$v['id'])echo "selected='selected'";?>><?php echo $v['name'];?></option>
              <?php } ?>
              <?php } ?>
            </select>
          </td>
          <th><label for="search_name">关键字</label></th>
          <td><input type="text" value="<?php echo $output['search_name'];?>" name="search_name" id="search_name" class="txt"></td>
          <td><a href="javascript:document.formSearch.submit();" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if($output['search_name'] != ''){?>
            <a href="index.php?act=links&op=index" class="btns " title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
            <?php }?></td>
        </tr>
      </tbody>
    </table>
  </form>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li><?php echo $lang['article_index_help1'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form method="post" id="form_article">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th class="w24"></th>
          <th class="w48">ID</th>
          <th >标题</th>
          <th >链接地址</th>
          <th >排序</th>
          <th >发布时间</th>
          <th class="w60 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['links_list']) && is_array($output['links_list'])){ ?>
        <?php foreach($output['links_list'] as $k => $v){ ?>
        <tr class="hover">
          <td><input type="checkbox" name='del_id[]' value="<?php echo $v['id']; ?>" class="checkitem"></td>
          <td><?php echo $v['id']; ?></td>
          <td><?php if(!empty($v['upload_path']))echo '<img src="'.$v['upload_path'].'" width="16" height="16">&nbsp;&nbsp;';?><font color="<?php echo $v['color']; ?>"><?php echo $v['title']; ?></font></td>
          <td><?php echo $v['link_url']; ?></td>
          <td><?php echo $v['ordering']; ?></td>
          <td><?php echo $v['input_time']; ?></td>
          <td class="align-center"><a href="index.php?act=links&op=edit&links_id=<?php echo $v['id']; ?>"><?php echo $lang['nc_edit'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['links_list']) && is_array($output['links_list'])){ ?>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
          <td colspan="16"><label for="checkallBottom"><?php echo $lang['nc_select_all']; ?></label>
            &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('<?php echo $lang['nc_ensure_del'];?>')){$('#form_article').submit();}"><span><?php echo $lang['nc_del'];?></span></a>
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
        <?php } ?>
      </tfoot>
    </table>
  </form>
</div>
