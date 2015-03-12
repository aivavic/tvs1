<?php
/**
 * month.php
 *
 * Part of YiiCalendar extension for Yii 1.x (based on ecalendarview extension).
 *
 * @website   http://www.yiiframework.com/extension/yii-calendar/
 * @website   https://github.com/trejder/yii-calendar
 * @author    Tomasz Trejderowski <tomasz@trejderowski.pl>
 * @author    Martin Ludvik <matolud@gmail.com>
 * @copyright Copyright (c) 2014 by Tomasz Trejderowski & Martin Ludvik
 * @license   http://opensource.org/licenses/MIT (MIT license)
 */
?>

<thead>
  <tr class="month-year-row">
    <th class="previous">
      <?php echo CHtml::link('&laquo;', $previousUrl, array('class' => 'navigation-link')); ?>
    </th>
    <th class="month-year" colspan="<?php echo $daysInRow - 2; ?>">
      <?php $this->getOwner()->renderFile($titleViewFile, array(
        'pagination' => $pagination,
      )); ?>
    </th>
    <th class="next">
      <?php echo CHtml::link('&raquo;', $nextUrl, array('class' => 'navigation-link')); ?>
    </th>
  </tr>
  <tr class="weekdays-row">
    <?php for($i = 0; $i < $daysInRow; ++ $i): ?>
      <th class="<?php echo strtolower($data[$i]->getDate()->format('D')); ?>">
        <?php echo Yii::t('yiicalendar', $data[$i]->getDate()->format('D')); ?>
      </th>
    <?php endfor ?>
  </tr>
</thead>

<tbody>
  <?php $i = 0; ?>
  <?php while($i < count($data)): ?>
    <tr>
      <?php for($j = 0; $j < $daysInRow; ++ $i, ++ $j): ?>
        <?php
          $classes = array();

          if($data[$i]->isCurrentDate) {
            $classes[] = 'current';
          } else {
            $classes[] = 'not-current';
          }

          if($data[$i]->isRelevantDate) {
            $classes[] = 'relevant';
          } else {
            $classes[] = 'not-relevant';
          }

          $classes[] = strtolower($data[$i]->date->format('D'));

          $classesStr = implode(' ', $classes);
        ?>
        <td class="<?php echo $classesStr; ?>">
          <?php $this->getOwner()->renderFile($itemViewFile, array(
            'data' => $data[$i]
          )); ?>
        </td>
      <?php endfor ?>
    </tr>
  <?php endwhile ?>
</tbody>
