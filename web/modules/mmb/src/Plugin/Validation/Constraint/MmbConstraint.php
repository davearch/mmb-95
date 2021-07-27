<?php

namespace Drupal\mmb\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Provides a MMB Constraint constraint.
 *
 * @Constraint(
 *   id = "MmbConstraint",
 *   label = @Translation("MMB Constraint", context = "Validation"),
 * )
 *
 * @DCG
 * To apply this constraint on third party entity types implement either
 * hook_entity_base_field_info_alter() or hook_entity_bundle_field_info_alter().
 */
class MmbConstraint extends Constraint {
  public $notWeekday = '(%value) is not a weekday.';
}
