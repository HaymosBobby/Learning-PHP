<?php
    class FileDataProvider extends DataProvider {
        public function get_terms() {
            $json = $this->get_data();
    
            return json_decode($json);
        }
    
        public function get_term($term) {
            $data = $this->get_terms();
    
            foreach($data as $item) {
                if ($item->term == $term) {
                    return $item;
                }
            }
    
            return false;
        }
    
        public function search_terms($search) {
            $items = $this->get_terms();
    
            $results = array_filter($items, function($item) use($search) {

                // str_contains() in place of strpos
                // str_starts_with($haystack, $needle)
                // str_ends_with($haystack, $needle)
                
                if(strpos(strtolower($item->term), strtolower($search)) !== false || strpos(strtolower($item->definition), strtolower($search)) !== false) {
                    return $item;
                }
            });
            return $results;
        }
    
        
    
        public function add_term($term, $definition) {
            $items = $this->get_terms();
    
            $items[] = new GlossaryTerm($term, $definition);
    
            // $arr = [
            //     "term" => $term,
            //     "definition" => $definition
            // ];
    
            // $obj = (object) $arr;
    
            // $items[] = $obj;
    
            $this->set_data($items);
        }
    
        public function update_term($original_term, $new_term, $definition) {
            $items = $this->get_terms();
    
            foreach($items as $item) {
                if ($item->term == $original_term) {
                    $item->term = $new_term;
                    $item->definition = $definition;
                    break;
                }
            }
            $this->set_data($items);
        }
    
        public function delete_term($term) {
            $terms = $this->get_terms();
    
            $terms = array_filter($terms, function($item) use($term) {
                return $item->term !== $term;
            });
    
    
            $new_terms = array_values($terms);
    
            $this->set_data($new_terms);
        }
    
        private function get_data() {
            $fname = $this->source;
    
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
        }
    
        private function set_data($arr) {
            $fname = $this->source;
    
            $json = json_encode($arr);
    
            file_put_contents($fname, $json);
        }   
    }