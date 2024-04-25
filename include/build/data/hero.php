<?php
/**
 * Load hero data
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

if(isset($get_meta['sls_hero'][0])){
    $heros = false;
    if(!empty($get_meta['sls_hero'][0])){
        $heros = $get_meta['sls_hero'][0];
        if (is_serialized($heros)) {
            $heros = unserialize($heros);
        }
    }
}

?>


<section class="hero">
    <div class="hero_inner">
        <span class="heading">Slider</span>
        <div id="btnhero">
            <i id="openhero" class='bx bx-plus-circle'></i>
            <i id="closehero" class='bx bx-minus-circle'></i>
        </div>
    </div>
    <div class="hero_body">

        <select style="display:none" id="cats_default">
            <?php foreach ($categories as $key => $option) : ?>
                <option value="<?php echo $key ?>"><?php echo $option; ?></option>
            <?php endforeach; ?>
        </select>

        <div class="input_type">
            <label for="">Active</label>
            <input <?php echo (isset($heros['active']) && !empty($heros['active'])) ? 'checked' : ''; ?> type="checkbox" name="hero[active]" value="true">
        </div>

        <div class="input_type">
            <label for="hero_cat">Category:</label>
            <select name="hero[cat]" id="hero_cat">
                <option value="">Default</option>
                <?php foreach ($categories as $key => $option) : ?>
                    <option value="<?php echo $key ?>" <?php if (isset($heros['cat']) && $heros['cat'] == $key) echo 'selected'; ?>><?php echo $option ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="input_type">
            <label for="">Random Post</label>
            <input <?php echo (isset($heros['order']) && $heros['order'] == 'true') ? 'checked' : ''; ?> id="hero_rand" type="checkbox" name="hero[order]" value="true">
        </div>
    </div>
</section>