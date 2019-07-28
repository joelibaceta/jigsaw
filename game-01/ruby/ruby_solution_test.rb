require 'test/unit'
require 'yaml'
require_relative 'ruby_solution'
 
class Game01Test < Test::Unit::TestCase

    include Solver

    @@cases = YAML.load_file("#{__dir__}/cases.yaml")

    def test_reduce_way
        test_lambda = lambda {|m, n| reduce_way(m, n)}
        assert_from_data(test_lambda)
    end

    def test_reduce_way_min
        test_lambda = lambda {|m, n| reduce_way_min(m, n)}
        assert_from_data(test_lambda)
    end

    def test_iteration_way
        test_lambda = lambda {|m, n| iteration_way(m, n)}
        assert_from_data(test_lambda)
    end

    def test_iteration_way_min
        test_lambda = lambda {|m, n| iteration_way_min(m, n)}
        assert_from_data(test_lambda)
    end

    def assert_from_data(callable_method)
        @@cases.each do |_, data|
            result = callable_method.call(data["m"], data["n"])
            assert_block "Expected #{data["solution"]}, got #{result}" do
                result == data["solution"]
            end
        end
    end
end

