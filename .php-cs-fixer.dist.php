<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules(
        [
            '@Symfony'                                      => true,
            '@PSR1'                                         => true,
            '@PSR2'                                         => true,
            '@PSR12'                                        => true,
            'align_multiline_comment'                       => true,
            'array_indentation'                             => true,
            'array_syntax'                                  => ['syntax' => 'short'],
            'binary_operator_spaces'                        => ['operators' => ['=>' => 'align', '=' => 'align']],
            'blank_line_after_namespace'                    => true,
            'blank_line_after_opening_tag'                  => true,
            'blank_line_before_statement'                   => true,
            'class_attributes_separation'                   => true,
            'class_definition'                              => ['single_line' => true],
            'combine_nested_dirname'                        => true,
            'compact_nullable_typehint'                     => true,
            'concat_space'                                  => ['spacing' => 'one'],
            'declare_equal_normalize'                       => ['space' => 'single'],
            'declare_strict_types'                          => true,
            'dir_constant'                                  => true,
            'ereg_to_preg'                                  => true,
            'explicit_indirect_variable'                    => true,
            'full_opening_tag'                              => true,
            'implode_call'                                  => true,
            'increment_style'                               => ['style' => 'post'],
            'is_null'                                       => true,
            'linebreak_after_opening_tag'                   => true,
            'logical_operators'                             => true,
            'magic_constant_casing'                         => true,
            'method_chaining_indentation'                   => true,
            'mb_str_functions'                              => true,
            'multiline_comment_opening_closing'             => true,
            'no_alternative_syntax'                         => true,
            'no_binary_string'                              => true,
            'no_empty_phpdoc'                               => true,
            'no_empty_statement'                            => true,
            'no_mixed_echo_print'                           => ['use' => 'echo'],
            'no_null_property_initialization'               => true,
            'no_php4_constructor'                           => true,
            'no_superfluous_elseif'                         => true,
            'no_superfluous_phpdoc_tags'                    => true,
            'no_useless_else'                               => true,
            'no_useless_return'                             => true,
            'no_unreachable_default_argument_value'         => true,
            'normalize_index_brace'                         => true,
            'ordered_class_elements'                        => true,
            'ordered_imports'                               => true,
            'php_unit_strict'                               => false,
            'phpdoc_add_missing_param_annotation'           => false,
            'phpdoc_order'                                  => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_types_order'                            => [
                'null_adjustment' => 'always_last',
                'sort_algorithm'  => 'none',
            ],
            'pow_to_exponentiation'                         => true,
            'random_api_migration'                          => true,
            'return_assignment'                             => true,
            'strict_comparison'                             => true,
            'ternary_to_null_coalescing'                    => true,
            'void_return'                                   => true,
            'yoda_style'                                    => true,
            'method_argument_space'                         => ['on_multiline' => 'ignore'],
            'native_function_invocation'                    => true,
        ]
    )
    ->setFinder($finder)
;
