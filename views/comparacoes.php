<select name="category">
    <option value=""><?php $this->lang->get('ALLCATEGORIES'); ?></option>
    <?php foreach ($viewData['categories'] as $cat) : ?>
        <option <?php echo ($viewData['category'] == $cat['id_categories']) ? 'selected=selected' : ''; ?> value=" <?php echo $cat['id_categories']; ?>"> <?php echo $cat['nm_categories']; ?> </option>
        <?php
        if (count($cat['subs']) > 0) {
            $this->loadView('search_subcategory', array(
                'subs' => $cat['subs'],
                'level' => 1,
                'category' => $viewData['category']
            ));
        }
        ?>
    <?php endforeach; ?>
</select>
<!-- Código acima deu erro, pois não valida a captura de category -->

<!-- --------------------------------------------------------------------------------------
Código abaixo deu certo -->
<select name="category">
    <option value=""><?php $this->lang->get('ALLCATEGORIES'); ?></option>
    <?php foreach ($viewData['categories'] as $cat) : ?>
        <option <?php echo (isset($viewData['category']) && $viewData['category'] == $cat['id_categories']) ? 'selected=selected' : ''; ?> value="<?php echo $cat['id_categories']; ?>"> <?php echo $cat['nm_categories']; ?> </option>
        <?php
        if (count($cat['subs']) > 0) {
            $this->loadView('search_subcategory', array(
                'subs' => $cat['subs'],
                'level' => 1,
                'category' => (isset($viewData['category']) ? $viewData['category'] : '')
            ));
        }
        ?>
    <?php endforeach; ?>
</select>

<!-- 
Acima alguns testes de código feito no template
---------------------------------------------------------------------------------- -->