import PropTypes from 'prop-types';

function Items({ value, icon }) {
    return (
        <div className='flex flex-1 flex-col justify-center items-center text-gray-500'>
            {icon}
            <span className='text-xs'>{value}</span>
        </div>
    );
}

Items.propTypes = {
    value: PropTypes.string.isRequired,
    icon: PropTypes.element.isRequired,
};

export default Items;

