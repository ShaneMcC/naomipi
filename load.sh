#!/bin/bash

IP="${1}"
BIN="${2}"
CURRENT="${3}"

if [ "${BIN}" = "" ]; then
	echo "Usage: ${0} <IP> <Game> [CURRENT.BIN]";
	exit 0;
fi;

if [ ! -e "${BIN}" -o ! -f "${BIN}" ]; then
	echo "Usage: ${0} <IP> <Game> [CURRENT.BIN]";
	exit 1;
fi;

if [ -e '/tmp/.naomiLock' ]; then
	echo "Another game is currently loading..."
	exit 1;
fi;

touch '/tmp/.naomiLock';

# http://www.ostricher.com/2014/10/the-right-way-to-get-the-directory-of-a-bash-script/
get_script_dir () {
	SOURCE="${BASH_SOURCE[0]}"
	# While $SOURCE is a symlink, resolve it
	while [ -h "$SOURCE" ]; do
		DIR="$( cd -P "$( dirname "$SOURCE" )" && pwd )"
		SOURCE="$( readlink "$SOURCE" )"
		# If $SOURCE was a relative symlink (so no "/" as prefix, need to resolve it relative to the symlink base directory
		[[ $SOURCE != /* ]] && SOURCE="$DIR/$SOURCE"
	done
	DIR="$( cd -P "$( dirname "$SOURCE" )" && pwd )"
	echo "$DIR"
}

echo "Loading '${BIN}' to '${IP}' ...";
echo "---"

"$(get_script_dir)/triforcetools.py" "${IP}" "${BIN}" 2>&1
RES=${?}

echo "---"

if [ "${RES}" = "0" -a "${CURRENT}" != "" ]; then
	ln -svf "${BIN}" "${CURRENT}"
fi;

rm -Rf '/tmp/.naomiLock'
