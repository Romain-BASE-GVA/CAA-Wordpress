<?php $currentLang = apply_filters( 'wpml_current_language', NULL ) ?>
<div class="popup popup--newsletter">
    <div class="popup__in">
        <?php if($currentLang == 'en'): ?>
            <iframe src="https://9aa5cbff.sibforms.com/serve/MUIEAAVXgssGU51C21Kly2PYTDPrHaMM4PX5FZps0AgsZruqd6gwkRB40YZcsVbjKMzS1ikEc8b8LMHHebPZA4lYPZ_JRYQ6XKbecNVBKrc8ZiC2FPnUtHGvI-rwG3WETqXiHVGekcrx9A2R3G3c2WUoDWNWbBpvL7TSno-073mDhZbKdZfety5m4QEvUAW4e8AXv4nvcbz6yNzA" frameborder="0" scrolling="auto" allowfullscreen></iframe>
        <?php else: ?>
            <iframe src="https://9aa5cbff.sibforms.com/serve/MUIEAJrHGZDNprIQqm51LiU7c5a56joBUdNSnMEAu2b3FFqEn5MocZtmnu9p0xgmotNF5r34_sgiheqI38VJQuNYAUKT7NOk8tx1aK0YN_kdWKrYnCYn24gkCbGV90Bw8nu-0_KIg1WkeR8GoNHmZE60Jqea3IPdl4Cn3QrDc4E-0MWAbCFlLm_UQBpcQPUGDA4ZYESNubkc8dHF" frameborder="0" scrolling="auto" allowfullscreen></iframe>
        <?php endif; ?>
        <button class="close-popup" title="Close Popup"><span>Close Popup</span></button>
    </div>
</div>