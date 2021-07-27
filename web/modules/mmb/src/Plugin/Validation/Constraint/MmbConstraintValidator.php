<?php

namespace Drupal\mmb\Plugin\Validation\Constraint;

use Drupal\datetime_range\Plugin\Field\FieldType\DateRangeItem;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the MMB Constraint constraint.
 */
class MmbConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($items, Constraint $constraint) {

    // $item -> DateRangeItem
    foreach ($items as $delta => $item) {
      if (!$item->isEmpty()) {
        $val_arr = $item->toArray();
        foreach ($val_arr as $format) {
          $dw = (int) date("N", strtotime($format));
          // Saturday, Sunday
          if ($dw == 6 || $dw == 7) {
            $this->context
              ->buildViolation($constraint->notWeekday, ['%value' => $format])
              ->atPath($delta)
              ->addViolation();
          }
        }
      }
    }
  }

}
