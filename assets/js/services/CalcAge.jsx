export default function CurrentAge (birthDate) {

    const birthday = new Date(birthDate);
    return new Number((new Date().getTime() - birthday.getTime()) / 31536000000).toFixed(0);
}
