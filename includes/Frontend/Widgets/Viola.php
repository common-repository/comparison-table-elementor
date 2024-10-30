<?php 
namespace Cte\Frontend\Widgets;
use \Elementor\Icons_Manager;

class Viola extends \Elementor\Widget_Base
{

        /**
         * Get widget name.
         *
         * Retrieve Blank widget name.
         *
         * @return string Widget name.
         * @since 1.0.0
         * @access public
         *
         */
        public function get_name()
        {
            return 'cte_voila';
        }

        /**
         * Get widget title.
         *
         * Retrieve Blank widget title.
         *
         * @return string Widget title.
         * @since 1.0.0
         * @access public
         *
         */
        public function get_title()
        {
            return esc_html__('Voila', 'comparison-table-elementor');
        }

        /**
         * Get widget icon.
         *
         * Retrieve Blank widget icon.
         *
         * @return string Widget icon.
         * @since 1.0.0
         * @access public
         *
         */
        public function get_icon()
        {
            return 'eicon-table';
        }

        /**
         * Get widget categories.
         *
         * Retrieve the list of categories the Blank widget belongs to.
         *
         * @return array Widget categories.
         * @since 1.0.0
         * @access public
         *
         */
        public function get_categories()
        {
            return ['cte'];
        }
        public function get_keywords()
        {
            return ['voila', 'comparison', 'table', 'comparison-table', 'cte'];
        }

       

        /**
         * Register Blank widget controls.
         *
         * Adds different input fields to allow the user to change and customize the widget settings.
         *
         * @since 1.0.0
         * @access protected
         */
        protected function register_controls()
        {

            $this->register_content_controls();
            $this->register_style_controls();
        }

        /**
         * Register Blank widget content ontrols.
         *
         * Adds different input fields to allow the user to change and customize the widget settings.
         *
         * @since 1.0.0
         * @access protected
         */
        function register_content_controls()
        {
            $this->start_controls_section(
                'cte_voila_start',
                [
                    'label' => esc_html__('Table Heading', 'comparison-table-elementor'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'cte_voila_table_heading_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Add Heading', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $repeater = new \Elementor\Repeater();        

            $repeater->add_control(
                'cte_voila_table_heading_text',
                [
                    'label' => esc_html__('Heading Text', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'cte_voila_table_heading_list',
                [
                    'label' => esc_html__('Heading List', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'separator' => 'before',
                    'title_field' => '{{ cte_voila_table_heading_text }}',
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'cte_voila_table_heading_text' => esc_html__('Features', 'comparison-table-elementor'),
                        ],
                        [
                            'cte_voila_table_heading_text' => esc_html__('Basic', 'comparison-table-elementor'),
                        ],
                        [
                            'cte_voila_table_heading_text' => esc_html__('Pro', 'comparison-table-elementor'),
                        ],
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'cte_voila_table_content_started',
                [
                    'label' => esc_html__('Table Content', 'comparison-table-elementor'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'cte_voila_table_item_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Add Items', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $repeater = new \Elementor\Repeater();

            /*Feature One*/

            $repeater->add_control(
                'cte_voila_table_item_feature_one_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature One', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_one',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'text',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_one',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Lorem Ipsum Title',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_one' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_one',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_one' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_one',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_one' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_one',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_one' => 'image',
							],
					],

				);

            /*Feature Two*/

            $repeater->add_control(
                'cte_voila_table_item_feature_two_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Two', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_one' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_two',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'icon',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_one' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_two',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_two' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_two',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'far fa-window-close',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_two' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_two',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_two' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_two',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_two' => 'image',
							],
					],

				);

            /*Feature Three*/

            $repeater->add_control(
                'cte_voila_table_item_feature_three_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Three', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_two' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_three',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'icon',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_two' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_three',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_three' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_three',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'far fa-check-square',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_three' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_three',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_three' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_three',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_three' => 'image',
							],
					],

				);

            /*Feature Four*/

            $repeater->add_control(
                'cte_voila_table_item_feature_four_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Four', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_three' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_four',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'none',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_three' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_four',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_four' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_four',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_four' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_four',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_four' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_four',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_four' => 'image',
							],
					],

				);

            /*Feature Five*/

            $repeater->add_control(
                'cte_voila_table_item_feature_five_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Five', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_four' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_five',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'none',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_four' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_five',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_five' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_five',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_five' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_five',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_five' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_five',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_five' => 'image',
							],
					],

				);			

            /*Feature Six*/

            $repeater->add_control(
                'cte_voila_table_item_feature_six_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Six', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_five' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_six',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'none',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_five' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_six',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_six' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_six',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_six' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_six',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_six' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_six',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_six' => 'image',
							],
					],

				);

            /*Feature Seven*/

            $repeater->add_control(
                'cte_voila_table_item_feature_seven_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Seven', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_six' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_seven',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'none',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_six' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_seven',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_seven' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_seven',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_seven' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_seven',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_seven' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_seven',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_seven' => 'image',
							],
					],

				);

            /*Feature Eight*/

            $repeater->add_control(
                'cte_voila_table_item_feature_eight_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Eight', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_seven' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_eight',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'none',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_seven' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_eight',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_eight' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_eight',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_eight' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_eight',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_eight' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_eight',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_eight' => 'image',
							],
					],

				);

            /*Feature Nine*/

            $repeater->add_control(
                'cte_voila_table_item_feature_nine_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Nine', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_eight' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_nine',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'none',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_eight' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_nine',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_nine' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_nine',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_nine' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_nine',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_nine' => 'image',
    		        		],
				]
			);

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_nine',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_nine' => 'image',
							],
					],

				);

            /*Feature Ten*/

            $repeater->add_control(
                'cte_voila_table_item_feature_ten_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Feature Ten', 'comparison-table-elementor'),
                    'separator' => 'before',
                    'condition' => [
								'cte_voila_table_item_type_feature_nine' => [ 'text', 'image','icon' ],
							]
                ]
            );

            $repeater->add_control(
    			'cte_voila_table_item_type_feature_ten',
    			[
    				'label' => esc_html__( 'Select Item Type', 'comparison-table-elementor' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'none',
    				'options' => [
    					'none' => esc_html__( 'Disable', 'comparison-table-elementor' ),
    					'text' => esc_html__( 'Text', 'comparison-table-elementor' ),
    					'icon'  => esc_html__( 'Icon', 'comparison-table-elementor' ),
    					'image' => esc_html__( 'Image', 'comparison-table-elementor' ),
    				],
    				'condition' => [
								'cte_voila_table_item_type_feature_nine' => [ 'text', 'image','icon' ],
							]
    			]
    		);

    		$repeater->add_control(
    		    'cte_voila_table_item_text_feature_ten',
    		    [
    		        'label' => esc_html__('Add Your Text', 'comparison-table-elementor'),
    		        'default' => 'Sample Text',
    		        'type' => \Elementor\Controls_Manager::TEXT,
    		        'label_block' => true,
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_ten' => 'text',
    		        		],
    		    ]
    		);

    		$repeater->add_control(
				'cte_voila_table_item_icon_feature_ten',
				[
					'label' => __( 'Icon', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
								'cte_voila_table_item_type_feature_ten' => 'icon',
							]
				]
			);

			$repeater->add_control(
				'cte_voila_table_item_image_feature_ten',
				[
					'label' => esc_html__( 'Choose Image', 'comparison-table-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
    		        'condition' => [
    		        			'cte_voila_table_item_type_feature_ten' => 'image',
    		        		],
				]
			);	

			$repeater->add_group_control(
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'cte_voila_table_item_image_feature_ten',
						'default' => 'thumbnail',
						'condition' => [
								'cte_voila_table_item_type_feature_ten' => 'image',
							],
					],

				);		

			/*Lists*/

            $this->add_control(
                'cte_voila_table_item_list',
                [
                    'label' => esc_html__('Items List', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'separator' => 'before',
                    'title_field' => '{{ cte_voila_table_item_text_feature_one }}',
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'cte_voila_table_item_text_feature_one' => esc_html__('Lorem Ipsum Title', 'comparison-table-elementor'),
                        ],
                        [
                            'cte_voila_table_item_text_feature_one' => esc_html__('Lorem ipsum Title', 'comparison-table-elementor'),
                        ],
                        [
                            'cte_voila_table_item_text_feature_one' => esc_html__('Lorem ipsum Title', 'comparison-table-elementor'),
                        ],
                        [
                            'cte_voila_table_item_text_feature_one' => esc_html__('Lorem ipsum Title', 'comparison-table-elementor'),
                        ],
                        [
                            'cte_voila_table_item_text_feature_one' => esc_html__('Lorem ipsum Title', 'comparison-table-elementor'),
                        ],
                        [
                            'cte_voila_table_item_text_feature_one' => esc_html__('Lorem ipsum Title', 'comparison-table-elementor'),
                        ],
                        [
                            'cte_voila_table_item_text_feature_one' => esc_html__('Lorem ipsum Title', 'comparison-table-elementor'),
                        ],
                    ],
                ]
            );

            
            $this->end_controls_section();
           
        }

        /**
         * Register Accordion widget style ontrols.
         *
         * Adds different input fields in the style tab to allow the user to change and customize the widget settings.
         *
         * @since 1.0.0
         * @access protected
         */
        protected function register_style_controls()
        {
            $this->start_controls_section(
                'cte_voila_table_heading_style',
                [
                    'label' => esc_html__('Heading Style', 'comparison-table-elementor'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'cte_voila_table_heading_background_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Heading', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $this->add_control(
                'cte_voila_table_heading_background_color',
                [
                    'label' => esc_html__('Background Color', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cte-main-table th' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cte_voila_table_heading_title_color',
                [
                    'label' => esc_html__('Text Color', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cte-main-table th' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'cte_voila_table_heading_typography',
                    'label' => esc_html__('Text Typography', 'comparison-table-elementor'),
                    'fields_options' => [

                    		'typography' => [
                    	            'default' => 'custom',
                    	    ],                           
                            'font_weight' => [
                                'default' => '600',
                            ]
                            
                        ],
                    'selector' => '{{WRAPPER}} .cte-main-table th',
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1
                ]
            );

            $this->add_group_control(
            	\Elementor\Group_Control_Border::get_type(),
            	[
            		'name' => 'cte_voila_table_heading_col_border',
            		'selector' => '{{WRAPPER}} .cte-main-table th',
            	]
            );

            $this->add_control(
                'cte_voila_table_heading_col_width_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Column Width', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $this->add_responsive_control(
    			'cte_voila_table_heading_col_width',
    			[
    				'type' => \Elementor\Controls_Manager::SLIDER,
    				'label' => esc_html__( 'Width', 'comparison-table-elementor' ),
    				'range' => [
    					'px' => [
    						'min' => 0,
    						'max' => 100,
    					],
    				],
    				'devices' => [ 'desktop', 'tablet', 'mobile' ],
    				'desktop_default' => [
    					'size' => 0,
    					'unit' => '%',
    				],
    				'tablet_default' => [
    					'size' => 10,
    					'unit' => '%',
    				],
    				'mobile_default' => [
    					'size' => 100,
    					'unit' => '%',
    				],
    				'selectors' => [
    					'{{WRAPPER}} .cte-main-table th' => 'width: {{SIZE}}{{UNIT}};',
    				],
    			]
    		);

            $this->end_controls_section();

          	// Heading List

            $this->start_controls_section(
                'cte_voila_table_item_section_style',
                [
                    'label' => esc_html__('Item Style', 'comparison-table-elementor'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'cte_voila_table_even_item_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Even Item', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $this->add_control(
                'cte_voila_table_item_even_text_color',
                [
                    'label' => esc_html__('Text Color', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cte-main-table tr:nth-child(even)' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'cte_voila_table_item_even_typography',
                    'label' => esc_html__('Typography', 'comparison-table-elementor'),
                    'selector' => '{{WRAPPER}} .cte-main-table tr:nth-child(even)',
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_2
                ]
            );

            $this->add_control(
                'cte_voila_table_item_row_even_background_color',
                [
                    'label' => esc_html__('Item Background', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cte-main-table tr:nth-child(even)' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cte_voila_table_odd_item_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Odd Item', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $this->add_control(
                'cte_voila_table_item_odd_text_color',
                [
                    'label' => esc_html__('Text Color', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cte-main-table tr:nth-child(odd)' => 'color: {{VALUE}};',
                    ],
                ]
            );  

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'cte_voila_table_item_row_odd_typography',
                    'label' => esc_html__('Typography', 'comparison-table-elementor'),
                    'selector' => '{{WRAPPER}} .cte-main-table tr:nth-child(odd)',
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_2
                ]
            );

            $this->add_control(
                'cte_voila_table_item_row_odd_background_color',
                [
                    'label' => esc_html__('Item Background', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cte-main-table tr:nth-child(odd)' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cte_voila_table_item_first_child_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Row First Item', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $this->add_control(
                'cte_voila_table_item_row_first_item_color',
                [
                    'label' => esc_html__('Color', 'comparison-table-elementor'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cte-main-table td:first-child' => 'color: {{VALUE}};',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'cte_voila_table_item_row_first_item_typography',
                    'label' => esc_html__('Typography', 'comparison-table-elementor'),
                    'selector' => '{{WRAPPER}} .cte-main-table td:first-child',
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_2
                ]
            );

            $this->add_control(
                'cte_voila_table_item_border_before',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => esc_html__('Item Border', 'comparison-table-elementor'),
                    'separator' => 'before'
                ]
            );

            $this->add_group_control(
    			\Elementor\Group_Control_Border::get_type(),
    			[
    				'name' => 'cte_voila_table_item_border',
    				'fields_options' => [
    							'border' => [
    								'default' => 'solid',
    							],
    							'width' => [
    								'default' => [
    									'top' => '1',
    									'right' => '1',
    									'bottom' => '1',
    									'left' => '1',
    									'isLinked' => false,
    								],
    							],
    							'color' => [
    								'default' => '#dcd7ca',
    							],
    						],
    				'selector' => '{{WRAPPER}} th, td',
    			]
    		);

    		$this->end_controls_section();

    		$this->start_controls_section(
    		    'cte_voila_table_item_icon_image_style',
    		    [
    		        'label' => esc_html__('Icons', 'comparison-table-elementor'),
    		        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    		    ]
    		);

    		$this->add_control(
    		    'cte_voila_table_item_icon_feature_two_color_before',
    		    [
    		        'type' => \Elementor\Controls_Manager::HEADING,
    		        'label' => esc_html__('Icon', 'comparison-table-elementor'),
    		        'separator' => 'before'
    		    ]
    		);

    		$this->add_control(
    		    'cte_voila_table_item_icon_feature_two_even_color',
    		    [
    		        'label' => esc_html__('Even Color', 'comparison-table-elementor'),
    		        'type' => \Elementor\Controls_Manager::COLOR,
    		        'default' => '#F82F1E',
    		        'selectors' => [
    		            '{{WRAPPER}} .cte-main-table td:nth-child(even) i' => 'color: {{VALUE}};',
    		        ]
    		    ]
    		);

    		$this->add_control(
    		    'cte_voila_table_item_icon_feature_two_odd_color',
    		    [
    		        'label' => esc_html__('Odd Color', 'comparison-table-elementor'),
    		        'type' => \Elementor\Controls_Manager::COLOR,
    		        'default' => '#61CE70',
    		        'selectors' => [
    		            '{{WRAPPER}} .cte-main-table td:nth-child(odd) i' => 'color: {{VALUE}};',
    		        ]
    		    ]
    		);
            
            $this->end_controls_section();

        }

        /**
         * Render Blank widget output on the frontend.
         *
         * Written in PHP and used to generate the final HTML.
         *
         * @since 1.0.0
         * @access protected
         */
        protected function render()
        {


            $settings = $this->get_settings_for_display();
            $cte_voila_heading_list =   $this->get_settings('cte_voila_table_heading_list');
            $cte_voila_item_list =   $this->get_settings('cte_voila_table_item_list');
            

    ?>

            <!-- Voila CTE Started -->

            <?php if ( $cte_voila_heading_list && $cte_voila_item_list ) : ?>
            
            	<div class="cte-main-table">  
            	    <table>

            	      <tr>

            	      	<?php
            	      		foreach ($cte_voila_heading_list as $heading_list): // TH Query Start
            	      		$table_heading = $heading_list['cte_voila_table_heading_text'];
            	      			
            	      	?>
	            	        <th>
	            	        	<?php 
	            	        		echo esc_html($table_heading); 
	            	        	?>
	            	        </th>
	            	        
	            	    <?php 
	            	    	endforeach; // TH Query End
	            	    ?>

            	      </tr>

            	      <?php
            	      		foreach ($cte_voila_item_list as $item_list): // TI Query Start

        	      			/* 
        	      			* Feature One Controls 
        	      			*/

        	      			$feature_one = $item_list['cte_voila_table_item_type_feature_one'];
        	      			$feature_one_text = $item_list['cte_voila_table_item_text_feature_one'];

        	      			$feature_one_icon = $item_list['cte_voila_table_item_icon_feature_one'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_one', 'src', $item_list['cte_voila_table_item_image_feature_one']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_one', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_one'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_one', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_one'] ) );


        	      			$feature_one_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_one', 'cte_voila_table_item_image_feature_one' );
        	      					
        	      			/* 
        	      			* Feature Two Controls 
        	      			*/

        	      			$feature_two = $item_list['cte_voila_table_item_type_feature_two'];
        	      			$feature_two_text = $item_list['cte_voila_table_item_text_feature_two'];

        	      			$feature_two_icon = $item_list['cte_voila_table_item_icon_feature_two'];

        	      			$image_two_size = $item_list['cte_voila_table_item_image_feature_two_size'];

        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_two', 'src', $item_list['cte_voila_table_item_image_feature_two']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_two', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_two'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_two', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_two'] ) );

        	      			$feature_two_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_two' , 'cte_voila_table_item_image_feature_two' );
        	      					
        	      			/* 
        	      			* Feature Three Controls 
        	      			*/

        	      			$feature_three = $item_list['cte_voila_table_item_type_feature_three'];
        	      			$feature_three_text = $item_list['cte_voila_table_item_text_feature_three'];

        	      			$feature_three_icon = $item_list['cte_voila_table_item_icon_feature_three'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_three', 'src', $item_list['cte_voila_table_item_image_feature_three']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_three', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_three'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_three', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_three'] ) );

        	      			$feature_three_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_three', 'cte_voila_table_item_image_feature_three' );
        	      					
        	      			/* 
        	      			* Feature Four Controls 
        	      			*/

        	      			$feature_four = $item_list['cte_voila_table_item_type_feature_four'];
        	      			$feature_four_text = $item_list['cte_voila_table_item_text_feature_four'];

        	      			$feature_four_icon = $item_list['cte_voila_table_item_icon_feature_four'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_four', 'src', $item_list['cte_voila_table_item_image_feature_four']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_four', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_four'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_four', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_four'] ) );

        	      			$feature_four_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_four', 'cte_voila_table_item_image_feature_four' );
        	      					
        	      			/* 
        	      			* Feature Five Controls 
        	      			*/

        	      			$feature_five = $item_list['cte_voila_table_item_type_feature_five'];
        	      			$feature_five_text = $item_list['cte_voila_table_item_text_feature_five'];

        	      			$feature_five_icon = $item_list['cte_voila_table_item_icon_feature_five'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_five', 'src', $item_list['cte_voila_table_item_image_feature_five']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_five', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_five'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_five', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_five'] ) );

        	      			$feature_five_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_five', 'cte_voila_table_item_image_feature_five' );
        	      					
        	      			/* 
        	      			* Feature Six Controls 
        	      			*/

        	      			$feature_six = $item_list['cte_voila_table_item_type_feature_six'];
        	      			$feature_six_text = $item_list['cte_voila_table_item_text_feature_six'];

        	      			$feature_six_icon = $item_list['cte_voila_table_item_icon_feature_six'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_six', 'src', $item_list['cte_voila_table_item_image_feature_six']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_six', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_six'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_six', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_six'] ) );

        	      			$feature_six_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_six', 'cte_voila_table_item_image_feature_six' );
        	      					
        	      			/* 
        	      			* Feature Seven Controls 
        	      			*/

        	      			$feature_seven = $item_list['cte_voila_table_item_type_feature_seven'];
        	      			$feature_seven_text = $item_list['cte_voila_table_item_text_feature_seven'];

        	      			$feature_seven_icon = $item_list['cte_voila_table_item_icon_feature_seven'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_seven', 'src', $item_list['cte_voila_table_item_image_feature_seven']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_seven', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_seven'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_seven', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_seven'] ) );

        	      			$feature_seven_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_seven', 'cte_voila_table_item_image_feature_seven' );
        	      					
        	      			/* 
        	      			* Feature Eight Controls 
        	      			*/

        	      			$feature_eight = $item_list['cte_voila_table_item_type_feature_eight'];
        	      			$feature_eight_text = $item_list['cte_voila_table_item_text_feature_eight'];

        	      			$feature_eight_icon = $item_list['cte_voila_table_item_icon_feature_eight'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_eight', 'src', $item_list['cte_voila_table_item_image_feature_eight']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_eight', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_eight'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_eight', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_eight'] ) );

        	      			$feature_eight_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_eight', 'cte_voila_table_item_image_feature_eight' );
        	      					
        	      			/* 
        	      			* Feature Nine Controls 
        	      			*/

        	      			$feature_nine = $item_list['cte_voila_table_item_type_feature_nine'];
        	      			$feature_nine_text = $item_list['cte_voila_table_item_text_feature_nine'];

        	      			$feature_nine_icon = $item_list['cte_voila_table_item_icon_feature_nine'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_nine', 'src', $item_list['cte_voila_table_item_image_feature_nine']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_nine', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_nine'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_nine', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_nine'] ) );

        	      			$feature_nine_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_nine', 'cte_voila_table_item_image_feature_nine' );
        	      					
        	      			/* 
        	      			* Feature Ten Controls 
        	      			*/

        	      			$feature_ten = $item_list['cte_voila_table_item_type_feature_ten'];
        	      			$feature_ten_text = $item_list['cte_voila_table_item_text_feature_ten'];

        	      			$feature_ten_icon = $item_list['cte_voila_table_item_icon_feature_ten'];
        	      			
        	      			
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_ten', 'src', $item_list['cte_voila_table_item_image_feature_ten']['url'] );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_ten', 'alt', \Elementor\Control_Media::get_image_alt( $item_list['cte_voila_table_item_image_feature_ten'] ) );
        	      			$this->add_render_attribute( 'cte_voila_table_item_image_feature_ten', 'title', \Elementor\Control_Media::get_image_title( $item_list['cte_voila_table_item_image_feature_ten'] ) );

        	      			$feature_ten_image = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item_list, 'cte_voila_table_item_image_feature_ten', 'cte_voila_table_item_image_feature_ten' );
            	      			
            	      	?>
            	      <tr>

            	      	<!-- Feature One Query Start -->

            	      	<?php if($feature_one !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_one == 'text'){
            	        				echo esc_html($feature_one_text);
            	        			}elseif($feature_one == 'icon'){
            	        				Icons_Manager::render_icon($feature_one_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_one == 'image'){
            	        				echo wp_kses_post($feature_one_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature One Query End -->



            	      	<!-- Feature Two Query Start -->

            	      	<?php if($feature_two !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_two == 'text'){
            	        				echo esc_html($feature_two_text);
            	        			}elseif($feature_two == 'icon'){          	        		Icons_Manager::render_icon($feature_two_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_two == 'image'){
            	        				echo wp_kses_post($feature_two_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Two Query End -->

            	      	<!-- Feature Three Query Start -->

            	      	<?php if($feature_three !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_three == 'text'){
            	        				echo esc_html($feature_three_text);
            	        			}elseif($feature_three == 'icon'){
            	        				Icons_Manager::render_icon($feature_three_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_three == 'image'){
            	        				echo wp_kses_post($feature_three_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Three Query End -->


            	      	<!-- Feature Four Query Start -->

            	      	<?php if($feature_four !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_four == 'text'){
            	        				echo esc_html($feature_four_text);
            	        			}elseif($feature_four == 'icon'){
            	        				Icons_Manager::render_icon($feature_four_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_four == 'image'){
            	        				echo wp_kses_post($feature_four_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Four Query End -->


            	      	<!-- Feature Five Query Start -->

            	      	<?php if($feature_five !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_five == 'text'){
            	        				echo esc_html($feature_five_text);
            	        			}elseif($feature_five == 'icon'){
            	        				Icons_Manager::render_icon($feature_five_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_five == 'image'){
            	        				echo wp_kses_post($feature_five_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Five Query End -->


            	      	<!-- Feature Six Query Start -->

            	      	<?php if($feature_six !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_six == 'text'){
            	        				echo esc_html($feature_six_text);
            	        			}elseif($feature_six == 'icon'){
            	        				Icons_Manager::render_icon($feature_six_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_six == 'image'){
            	        				echo wp_kses_post($feature_six_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Six Query End -->


            	      	<!-- Feature Seven Query Start -->

            	      	<?php if($feature_seven !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_seven == 'text'){
            	        				echo esc_html($feature_seven_text);
            	        			}elseif($feature_seven == 'icon'){
            	        				Icons_Manager::render_icon($feature_seven_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_seven == 'image'){
            	        				echo wp_kses_post($feature_seven_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Seven Query End -->


            	      	<!-- Feature Eight Query Start -->

            	      	<?php if($feature_eight !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_eight == 'text'){
            	        				echo esc_html($feature_eight_text);
            	        			}elseif($feature_eight == 'icon'){
            	        				Icons_Manager::render_icon($feature_eight_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_eight == 'image'){
            	        				echo wp_kses_post($feature_eight_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Eight Query End -->


            	      	<!-- Feature Nine Query Start -->

            	      	<?php if($feature_nine !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_nine == 'text'){
            	        				echo esc_html($feature_nine_text);
            	        			}elseif($feature_nine == 'icon'){
            	        				Icons_Manager::render_icon($feature_nine_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_nine == 'image'){
            	        				echo wp_kses_post($feature_nine_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Nine Query End -->


            	      	<!-- Feature Ten Query Start -->

            	      	<?php if($feature_ten !== 'none'): ?>
            	        	<td>
            	        		<?php 
            	        			if($feature_ten == 'text'){
            	        				echo esc_html($feature_ten_text);
            	        			}elseif($feature_ten == 'icon'){
            	        				Icons_Manager::render_icon($feature_ten_icon,[ 'aria-hidden' => 'true' ]);
            	        			}elseif($feature_ten == 'image'){
            	        				echo wp_kses_post($feature_ten_image);
            	        			}
            	        		?>
            	        	</td>
            	    	<?php endif; ?>

            	    	<!-- Feature Ten Query End -->            	    	 

            	      </tr>

            	      <?php 
            	      	endforeach; // TI Query End
            	      ?>

            	    </table>
            	</div>

            <?php endif; ?>

            <!-- Voila CTE Ended -->



    <?php
        }
    }

    ?>