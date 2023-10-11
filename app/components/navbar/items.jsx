import PropTypes from 'prop-types';
import Image from 'next/image';

function Items({ value, icon }) {
    return (
        <div className='flex flex-1 flex-col justify-center items-center text-gray-500'>
            <Image className='mr-1' src={icon} width={24} height={24} alt="" />
            <span className='text-xs'>{value}</span>
        </div>
    );
}

Items.propTypes = {
    value: PropTypes.string.isRequired,
    icon: PropTypes.string.isRequired,
};

export default Items;
