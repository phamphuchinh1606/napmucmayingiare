<?php $this->load->view('admin/setting/header', $this->data); ?>
<div class="wrapper">
    <!-- Form -->
    <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <?php $this->load->view('admin/message', $this->data); ?>
                <div class="title">
                    <img src="<?= public_url('admin/')?>images/icons/dark/add.png" class="titleIcon" />
                    <h6>CHỈNH SỬA THÔNG TIN LIÊN HỆ</h6>
                </div>
                <ul class="tabs">
                    <li><a href="#tab2">Chân trang & thông tin liên hệ</a></li>
                    <li><a href="#tab3">Mạng xã hội</a></li>
                    <li><a href="#tab4">Logo & Banner</a></li>
                    <li><a href="#tab5">SEO</a></li>
                </ul>
                <div class="tab_container">
                <div id='tab2' class="tab_content pd0">
                    <div style="padding-top: 10px;">
                    <div class="formRow">
                        <label class="formLeft">Email nhận thông tin khách:</label>
                        <div class="formRight">
                            <textarea name="emailnhan" rows="3"><?=$infost->emailnhan;?></textarea>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Website:</label>
                        <div class="formRight">
                            <input name="website" value="<?=$infost->website;?>" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow" style="display: none;">
                        <label class="formLeft">Video giới thiệu:</label>
                        <div class="formRight">
                            <input name="video_gioithieu" value="<?=$infost->video_gioithieu;?>" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                        
                        <div id='chantrangvi'>
                            <div class="formRow">
                                <label class="formLeft">Tên công ty:</label>
                                <div class="formRight">
                                    <input name="tenquocte" value="<?=$infost->tenquocte;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Tên viết tắt:</label>
                                <div class="formRight">
                                    <input name="tengoitat" value="<?=$infost->tengoitat;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Địa chỉ:</label>
                                <div class="formRight">
                                    <textarea name="diachi" rows="3"><?=$infost->diachi;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Số điện thoại:</label>
                                <div class="formRight">
                                    <input name="sdt" value="<?=$infost->sdt;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Email:</label>
                                <div class="formRight">
                                    <input name="email" value="<?=$infost->email;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tên video giới thiệu:</label>
                                <div class="formRight">
                                    <input name="name_video_gioithieu" value="<?=$infost->name_video_gioithieu;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Mô tả video giới thiệu:</label>
                                <div class="formRight">
                                    <textarea name="intro_video_gioithieu" rows="5"><?=$infost->intro_video_gioithieu;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tiêu đề block Footer:</label>
                                <div class="formRight">
                                    <input name="tieude_block_sp" value="<?=$infost->tieude_block_sp;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Intro block Footer:</label>
                                <div class="formRight">
                                    <textarea name="intro_block_sp" rows="5"><?=$infost->intro_block_sp;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tiêu đề block tin tức:</label>
                                <div class="formRight">
                                    <input name="tieude_block_tin" value="<?=$infost->tieude_block_tin;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Intro block tin tức:</label>
                                <div class="formRight">
                                    <textarea name="intro_block_tin" rows="5"><?=$infost->intro_block_tin;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tiêu đề ý kiến khách hàng:</label>
                                <div class="formRight">
                                    <input name="tieude_ykien" value="<?=$infost->tieude_ykien;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Intro ý kiến khách hàng:</label>
                                <div class="formRight">
                                    <textarea name="intro_ykien" rows="5"><?=$infost->intro_ykien;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tiêu đề block đăng ký:</label>
                                <div class="formRight">
                                    <input name="tieude_block_dangky" value="<?=$infost->tieude_block_dangky;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Intro block đăng ký:</label>
                                <div class="formRight">
                                    <textarea name="intro_block_dangky" rows="5"><?=$infost->intro_block_dangky;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_meta_desc">Chỉ đường:</label>
                                <div class="formRight">
                                    <textarea name="map" rows="5"><?=$infost->map;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Thông báo đặt hàng thành công:</label>
                                <div class="formRight">
                                    <textarea name="dkthanhcong" id="dkthanhcong" class="editor"><?=$infost->dkthanhcong;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Thông tin liên hệ:</label>
                                <div class="formRight">
                                    <textarea name="thongtinlienhe" id="thongtinlienhe" class="editor"><?=$infost->thongtinlienhe;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <?php if(isset($xemnhieu) && $xemnhieu):?>
                            <div class="formRow" style="display:none">
                                <label class="formLeft">Bài viết xem nhiều (ID):</label>
                                <div class="formRight">
                                    <select name="id_xemnhieu">
                                        <option value="0">-- Chọn bài viết --</option>
                                        <?php foreach($xemnhieu as $row):?>
                                        <option value="<?=$row->id?>" <?=($infost->id_xemnhieu == $row->id)?'selected':''?>>
                                            <?=$row->name?>
                                            <?php if($infosetting->ngonngu != 0):?> 
                                            (<?=$row->name_en?>)
                                            <?php endif;?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php endif;?>
                            
                            <div class="formRow">
                                <label class="formLeft">Tiêu đề Footer 1:</label>
                                <div class="formRight">
                                    <input name="tieudefooter1" value="<?=$infost->tieudefooter1;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Nội dung Footer 1:</label>
                                <div class="formRight">
                                    <textarea name="footer1" id="footer1" class="editor"><?=$infost->footer1; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Tiêu đề Footer 2:</label>
                                <div class="formRight">
                                    <input name="tieudefooter2" value="<?=$infost->tieudefooter2;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Nội dung Footer 2:</label>
                                <div class="formRight">
                                    <textarea name="footer2" id="footer2" class="editor"><?=$infost->footer2; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Tiêu đề Footer 3:</label>
                                <div class="formRight">
                                    <input name="tieudefooter3" value="<?= $infost->tieudefooter3;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="formRow">
                                <label class="formLeft">Tiêu đề Footer 4:</label>
                                <div class="formRight">
                                    <input name="tieudefooter4" value="<?= $infost->tieudefooter4;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="">
                                <label class="formLeft">Chính Sách Bảo Hành:</label>
                                <div class="formRight">
                                    <textarea name="footer3" id="footer3" class="editor"><?=$infost->footer3; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="">
                                <label class="formLeft">Tư Vấn:</label>
                                <div class="formRight">
                                    <textarea name="footer4" id="footer4" class="editor"><?=$infost->footer4; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tiêu đề Footer 5:</label>
                                <div class="formRight">
                                    <input name="tieudefooter5" value="<?=$infost->tieudefooter5;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Nội dung Footer 5:</label>
                                <div class="formRight">
                                    <textarea name="footer5" id="footer5" class="editor"><?=$infost->footer5; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tiêu đề Footer 6:</label>
                                <div class="formRight">
                                    <input name="tieudefooter6" value="<?= $infost->tieudefooter6;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Nội dung Footer 6:</label>
                                <div class="formRight">
                                    <textarea name="footer6" id="footer6" class="editor"><?=$infost->footer6; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div id='chantrangen' <?php if($infosetting->ngonngu == 0):?> style="display: none;" <?php endif;?> >
                            <div class="formRow">
                                <label class="formLeft">International Business Name:</label>
                                <div class="formRight">
                                    <input name="tenquocte_en" value="<?=$infost->tenquocte_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Abbreviations:</label>
                                <div class="formRight">
                                    <input name="tengoitat_en" value="<?=$infost->tengoitat_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Address:</label>
                                <div class="formRight">
                                    <textarea name="address" rows="3"><?=$infost->address;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Phone:</label>
                                <div class="formRight">
                                    <input name="sdt_en" value="<?=$infost->sdt_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Email:</label>
                                <div class="formRight">
                                    <input name="email_en" value="<?=$infost->email_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tên video giới thiệu:</label>
                                <div class="formRight">
                                    <input name="name_video_gioithieu_en" value="<?=$infost->name_video_gioithieu_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Mô tả video giới thiệu:</label>
                                <div class="formRight">
                                    <textarea name="intro_video_gioithieu_en" rows="5"><?=$infost->intro_video_gioithieu_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Tiêu đề block sản phẩm:</label>
                                <div class="formRight">
                                    <input name="tieude_block_sp_en" value="<?=$infost->tieude_block_sp_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Intro block sản phẩm:</label>
                                <div class="formRight">
                                    <textarea name="intro_block_sp_en" rows="5"><?=$infost->intro_block_sp_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Tiêu đề block tin tức:</label>
                                <div class="formRight">
                                    <input name="tieude_block_tin_en" value="<?=$infost->tieude_block_tin_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Intro block tin tức:</label>
                                <div class="formRight">
                                    <textarea name="intro_block_tin_en" rows="5"><?=$infost->intro_block_tin_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tiêu đề ý kiến khách hàng:</label>
                                <div class="formRight">
                                    <input name="tieude_ykien_en" value="<?=$infost->tieude_ykien_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Intro ý kiến khách hàng:</label>
                                <div class="formRight">
                                    <textarea name="intro_ykien_en" rows="5"><?=$infost->intro_ykien_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Tiêu đề block đăng ký:</label>
                                <div class="formRight">
                                    <input name="tieude_block_dangky_en" value="<?=$infost->tieude_block_dangky_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Intro block đăng ký:</label>
                                <div class="formRight">
                                    <textarea name="intro_block_dangky_en" rows="5"><?=$infost->intro_block_dangky_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_meta_desc">Map:</label>
                                <div class="formRight">
                                    <textarea name="map_en" rows="5"><?=$infost->map_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Successful order:</label>
                                <div class="formRight">
                                    <textarea name="dkthanhcong_en" id="dkthanhcong_en" class="editor"><?=$infost->dkthanhcong_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Contact Information:</label>
                                <div class="formRight">
                                    <textarea name="thongtinlienhe_en" id="thongtinlienhe_en" class="editor"><?=$infost->thongtinlienhe_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title Footer 1:</label>
                                <div class="formRight">
                                    <input name="tieudefooter1_en" value="<?=$infost->tieudefooter1_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Content Footer 1:</label>
                                <div class="formRight">
                                    <textarea name="footer1_en" id="footer1_en" class="editor"><?=$infost->footer1_en; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title Footer 2:</label>
                                <div class="formRight">
                                    <input name="tieudefooter2_en" value="<?=$infost->tieudefooter2_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Content Footer 2:</label>
                                <div class="formRight">
                                    <textarea name="footer2_en" id="footer2_en" class="editor"><?=$infost->footer2_en; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title Footer 3:</label>
                                <div class="formRight">
                                    <input name="tieudefooter3_en" value="<?= $infost->tieudefooter3_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Content Footer 3:</label>
                                <div class="formRight">
                                    <textarea name="footer3_en" id="footer3_en" class="editor"><?=$infost->footer3_en; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title Footer 4:</label>
                                <div class="formRight">
                                    <input name="tieudefooter4_en" value="<?= $infost->tieudefooter4_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Content Footer 4:</label>
                                <div class="formRight">
                                    <textarea name="footer4_en" id="footer4_en" class="editor"><?=$infost->footer4_en; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Title Footer 5:</label>
                                <div class="formRight">
                                    <input name="tieudefooter5_en" value="<?=$infost->tieudefooter5_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Content Footer 5:</label>
                                <div class="formRight">
                                    <textarea name="footer5_en" id="footer5_en" class="editor"><?=$infost->footer5_en; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Title Footer 6:</label>
                                <div class="formRight">
                                    <input name="tieudefooter6_en" value="<?= $infost->tieudefooter6_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="display: none;">
                                <label class="formLeft">Content Footer 6:</label>
                                <div class="formRight">
                                    <textarea name="footer6_en" id="footer6_en" class="editor"><?=$infost->footer6_en; ?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="formRow hide"></div>
                </div>
                <div id='tab3' class="tab_content pd0">
                    <div class="formRow">
                        <label class="formLeft">Facebook:</label>
                        <div class="formRight">
                            <input name="facebook" value="<?=$infost->facebook;?>" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow" style="display: none;">
                        <label class="formLeft">Youtube:</label>
                        <div class="formRight">
                            <input name="youtube" value="<?= $infost->youtube;?>" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow" style="display: none;">
                        <label class="formLeft">Google +:</label>
                        <div class="formRight">
                            <input name="google" value="<?= $infost->google;?>" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow" style="display: none;">
                        <label class="formLeft">Skype:</label>
                        <div class="formRight">
                            <input name="skype" value="<?=$infost->skype;?>" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow" style="display: none;">
                        <label class="formLeft">Linkedin:</label>
                        <div class="formRight">
                            <input name="linkedin" value="<?=$infost->linkedin;?>" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div id='tab4' class="tab_content pd0">
                    <div class="formRow">
                        <label class="formLeft">LOGO 1:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" name="logo" />
                                <?php if($infost->logo):?>
                                <img src="<?= base_url('uploads/images/logo-banner/'.$infost->logo)?>" style="width: 100px">
                                <?php else:?>Bạn chưa upload ảnh.<?php endif;?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">LOGO 2:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" name="logo2" />
                                <?php if($infost->logo2):?>
                                <img src="<?= base_url('uploads/images/logo-banner/'.$infost->logo2)?>" style="width: 100px">
                                <?php else:?>Bạn chưa upload ảnh.<?php endif;?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                        <label class="formLeft">FAVICO:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" name="favico" />
                                <?php if($infost->favico):?>
                                <img src="<?= base_url('uploads/images/logo-banner/'.$infost->favico)?>" style="width:50px;">
                                <?php else: ?> Bạn chưa upload Favico.<?php endif; ?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>


                    <div class="formRow" style="display: none;">
                        <label class="formLeft">BANNER QUẢNG CÁO 1:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" name="bannerqc1" />
                                <?php if($infost->bannerqc1):?>
                                <img src="<?= base_url('uploads/images/logo-banner/'.$infost->bannerqc1)?>" style="width:200px;">
                                <?php else: ?> Bạn chưa upload banner quảng cáo.<?php endif; ?>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <label class="formLeft">LINK QUẢNG CÁO 1:</label>
                        <div class="formRight">
                            <input name="linkqc1" value="<?=$infost->linkqc1;?>" type="text" style="width:240px;"/>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow" style="display: none;">
                        <label class="formLeft">BANNER QUẢNG CÁO 2:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" name="bannerqc2" />
                                <?php if($infost->bannerqc1):?>
                                <img src="<?= base_url('uploads/images/logo-banner/'.$infost->bannerqc2)?>" style="width:200px;">
                                <?php else: ?> Bạn chưa upload banner quảng cáo.<?php endif; ?>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <label class="formLeft">LINK QUẢNG CÁO 2:</label>
                        <div class="formRight">
                            <input name="linkqc2" value="<?=$infost->linkqc2;?>" type="text" style="width:240px;"/>
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>
                <div id='tab5' class="tab_content pd0">
                    <div class="formRow">
                        <label class="formLeft">Ảnh trang chủ:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" id="image" name="image_home" />
                                <?php if($infost->image_home):?>
                                <img src="<?=base_url('uploads/images/logo-banner/'.$infost->image_home)?>" style="width: 100px">
                                <?php else:?>Chưa có ảnh đại diện.<?php endif;?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Ảnh trang sản phẩm:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" name="image_pagesp" />
                                <?php if($infost->image_pagesp):?>
                                <img src="<?=base_url('uploads/images/logo-banner/'.$infost->image_pagesp)?>" style="width: 100px">
                                <?php else:?>Chưa có ảnh đại diện.<?php endif;?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Ảnh trang liên hệ:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" id="image" name="image_pagelh" />
                                <?php if($infost->image_pagelh):?>
                                <img src="<?=base_url('uploads/images/logo-banner/'.$infost->image_pagelh)?>" style="width: 100px">
                                <?php else:?>Chưa có ảnh đại diện.<?php endif;?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div style="padding-top: 15px;">
                        
                        <div id="seovi">
                            <div class="formRow" style="text-align: center;">
                                <h5>TRANG CHỦ</h5>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title trang chủ:</label>
                                <div class="formRight">
                                    <input name="title_home" value="<?=$infost->title_home;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Description trang chủ:</label>
                                <div class="formRight">
                                    <textarea name="des_home" rows="5" ><?=$infost->des_home;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Keyword trang chủ:</label>
                                <div class="formRight">
                                    <textarea name="key_home" rows="5"><?=$infost->key_home;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="text-align: center;">
                                <h5>SẢN PHẨM</h5>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title trang sản phẩm:</label>
                                <div class="formRight">
                                    <input name="title_pagesp" value="<?=$infost->title_pagesp;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Description trang sản phẩm:</label>
                                <div class="formRight">
                                    <textarea name="des_pagesp" rows="5"><?=$infost->des_pagesp;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Keyword trang sản phẩm:</label>
                                <div class="formRight">
                                    <textarea name="key_pagesp" rows="5"><?=$infost->key_pagesp;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="text-align: center;">
                                <h5>LIÊN HỆ</h5>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title trang liên hệ:</label>
                                <div class="formRight">
                                    <input name="title_pagelh" value="<?=$infost->title_pagelh;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Description trang liên hệ:</label>
                                <div class="formRight">
                                    <textarea name="des_pagelh" rows="5"><?=$infost->des_pagelh;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Keyword trang liên hệ:</label>
                                <div class="formRight">
                                    <textarea name="key_pagelh" rows="5"><?=$infost->key_pagelh;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div id="seoen" <?php if($infosetting->ngonngu == 0):?> style="display: none;" <?php endif;?>>
                            <div class="formRow" style="text-align: center;">
                                <h5>HOME</h5>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title home:</label>
                                <div class="formRight">
                                    <input name="title_home_en" value="<?=$infost->title_home_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Description home:</label>
                                <div class="formRight">
                                    <textarea name="des_home_en" rows="5" ><?=$infost->des_home_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Keyword home:</label>
                                <div class="formRight">
                                    <textarea name="key_home_en" rows="5"><?=$infost->key_home_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="text-align: center;">
                                <h5>PRODUCT</h5>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title product:</label>
                                <div class="formRight">
                                    <input name="title_pagesp_en" value="<?=$infost->title_pagesp_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Description product:</label>
                                <div class="formRight">
                                    <textarea name="des_pagesp_en" rows="5"><?=$infost->des_pagesp_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Keyword product:</label>
                                <div class="formRight">
                                    <textarea name="key_pagesp_en" rows="5"><?=$infost->key_pagesp_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" style="text-align: center;">
                                <h5>CONTACT</h5>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Title contact:</label>
                                <div class="formRight">
                                    <input name="title_pagelh_en" value="<?=$infost->title_pagelh_en;?>" type="text" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Description contact:</label>
                                <div class="formRight">
                                    <textarea name="des_pagelh_en" rows="5"><?=$infost->des_pagelh_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft">Keyword contact:</label>
                                <div class="formRight">
                                    <textarea name="key_pagelh_en" rows="5"><?=$infost->key_pagelh_en;?></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End tab_container-->
            <div class="formSubmit">
                <input type="submit" value="Cập nhật" class="redB" />
                <input type="reset" value="Hủy bỏ" class="basic" />
            </div>
            <div class="clear"></div>
        </div>
</fieldset>
</form>
</div>
<div class="clear mt30"></div>