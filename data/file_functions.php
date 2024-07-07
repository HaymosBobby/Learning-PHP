<?php  

    require "glossary_term.class.php";

    function get_terms() {
        $json = get_data();

        return json_decode($json);
    };

    function get_term($term) {
        $data = get_terms();

        foreach($data as $item) {
            if ($item->term == $term) {
                return $item;
            }
        }

        return false;
    }

    function search_terms($search) {
        $items = get_terms();

        $results = array_filter($items, function($item) use($search) {
            if(strpos(strtolower($item->term), strtolower($search)) !== false || strpos(strtolower($item->definition), strtolower($search)) !== false) {
                return $item;
            }
        });
        return $results;
    }

    function get_data() {
        $fname = CONFIG["data_file"];

        $json = "";
        if (!file_exists($fname)) {
            // $handle = fopen($fname, "w+");
            // fclose($handle);
            file_put_contents($fname, "");
        } else {
            // $handle = fopen($fname, "r");
            // $json  = fread($handle, filesize($fname));
            // fclose($handle);
            $json = file_get_contents($fname);

            return $json;
        };
    };

    function add_term($term, $definition) {
        $items = get_terms();

        $items[] = new GlossaryTerm($term, $definition);

        // $arr = [
        //     "term" => $term,
        //     "definition" => $definition
        // ];

        // $obj = (object) $arr;

        // $items[] = $obj;

        set_data($items);
    }

    function update_term($original_term, $new_term, $definition) {
        $items = get_terms();

        foreach($items as $item) {
            if ($item->term == $original_term) {
                $item->term = $new_term;
                $item->definition = $definition;
                break;
            }
        }
        set_data($items);
    }

    function delete_term($term) {
        $terms = get_terms();

        $terms = array_filter($terms, function($item) use($term) {
            return $item->term !== $term;
        });


        $new_terms = array_values($terms);

        set_data($new_terms);
    }

    function set_data($arr) {
        $fname = CONFIG["data_file"];

        $json = json_encode($arr);

        file_put_contents($fname, $json);
    }
